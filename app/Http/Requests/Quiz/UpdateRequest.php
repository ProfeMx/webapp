<?php

namespace App\Http\Requests\Quiz;

use App\Models\Quiz;
use App\Http\Resources\Models\QuizResource;
use App\Http\Events\Quiz\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $quiz = Quiz::findOrFail($this->quiz_id);

        return $this->user()->can('update', $quiz);

    }

    public function rules()
    {
        return [
            //
            'quiz_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $quiz = Quiz::findOrFail($this->quiz_id);

        $quiz = $quiz->updateModel($this);

        $response = new QuizResource($quiz);

        event(new UpdateEvent($quiz, $this, $response));

        return $response;

    }

}

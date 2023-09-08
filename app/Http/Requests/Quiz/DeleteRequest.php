<?php

namespace App\Http\Requests\Quiz;

use App\Models\Quiz;
use App\Http\Resources\Models\QuizResource;
use App\Http\Events\Quiz\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $quiz = Quiz::findOrFail($this->quiz_id);

        return $this->user()->can('delete', $quiz);

    }

    public function rules()
    {
        return [
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

        $quiz->deleteModel();

        $response = new QuizResource($quiz);

        event(new DeleteEvent($quiz, $this->all(), $response));

        return $response;

    }
    
}

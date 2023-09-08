<?php

namespace App\Http\Requests\Quiz;

use App\Models\Quiz;
use App\Http\Resources\Models\QuizResource;
use App\Http\Events\Quiz\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $quiz = Quiz::withTrashed()->findOrFail($this->quiz_id);
        
        return $this->user()->can('forceDelete', $quiz);

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

        $quiz = Quiz::withTrashed()->findOrFail($this->quiz_id);

        $quiz->forceDeleteModel();

        $response = new QuizResource($quiz);

        event(new ForceDeleteEvent($quiz, $this->all(), $response));

        return $response;

    }
    
}

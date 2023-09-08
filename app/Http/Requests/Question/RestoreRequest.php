<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use App\Http\Resources\Models\QuestionResource;
use App\Http\Events\Question\Events\RestoreEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $question = Question::withTrashed()->findOrFail($this->question_id);
        
        return $this->user()->can('restore', $question);

    }

    public function rules()
    {
        return [
            'question_id' => 'required|numeric'
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

        $question = Question::withTrashed()->findOrFail($this->question_id);

        $question->restoreModel();

        $response = new QuestionResource($question);

        event(new RestoreEvent($question, $this->all(), $response));

        return $response;

    }
    
}

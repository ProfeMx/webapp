<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use App\Http\Resources\Models\QuestionResource;
use App\Http\Events\Question\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $question = Question::findOrFail($this->question_id);

        return $this->user()->can('delete', $question);

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

        $question = Question::findOrFail($this->question_id);

        $question->deleteModel();

        $response = new QuestionResource($question);

        event(new DeleteEvent($question, $this, $response));

        return $response;

    }
    
}

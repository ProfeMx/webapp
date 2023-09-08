<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use App\Http\Resources\Models\QuestionResource;
use App\Http\Events\Question\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $question = Question::withTrashed()->findOrFail($this->question_id);
        
        return $this->user()->can('forceDelete', $question);

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

        $question->forceDeleteModel();

        $response = new QuestionResource($question);

        event(new ForceDeleteEvent($question, $this->all(), $response));

        return $response;

    }
    
}

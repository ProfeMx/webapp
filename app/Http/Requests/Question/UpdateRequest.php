<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use App\Http\Resources\Models\QuestionResource;
use App\Http\Events\Question\Events\UpdateEvent;
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
        
        $question = Question::findOrFail($this->question_id);

        return $this->user()->can('update', $question);

    }

    public function rules()
    {
        return [
            'weight' => 'required|numeric',
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

        $question = $question->updateModel($this);

        $response = new QuestionResource($question);

        event(new UpdateEvent($question, $this->all(), $response));

        return $response;

    }

}

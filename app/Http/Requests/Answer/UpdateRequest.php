<?php

namespace App\Http\Requests\Answer;

use App\Models\Answer;
use App\Http\Resources\Models\AnswerResource;
use App\Http\Events\Answer\Events\UpdateEvent;
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
        
        $answer = Answer::findOrFail($this->answer_id);

        return $this->user()->can('update', $answer);

    }

    public function rules()
    {
        return [
            'grade_override' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'feedback_override'=> 'nullable|string|max:1500',
            'answer_id' => 'required|numeric'
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

        $answer = Answer::findOrFail($this->answer_id);

        $answer = $answer->updateModel($this);

        $response = new AnswerResource($answer);

        event(new UpdateEvent($answer, $this->all(), $response));

        return $response;

    }

}

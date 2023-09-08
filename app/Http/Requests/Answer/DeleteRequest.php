<?php

namespace App\Http\Requests\Answer;

use App\Models\Answer;
use App\Http\Resources\Models\AnswerResource;
use App\Http\Events\Answer\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $answer = Answer::findOrFail($this->answer_id);

        return $this->user()->can('delete', $answer);

    }

    public function rules()
    {
        return [
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

        $answer->deleteModel();

        $response = new AnswerResource($answer);

        event(new DeleteEvent($answer, $this->all(), $response));

        return $response;

    }
    
}

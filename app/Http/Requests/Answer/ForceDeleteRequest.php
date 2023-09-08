<?php

namespace App\Http\Requests\Answer;

use App\Models\Answer;
use App\Http\Resources\Models\AnswerResource;
use App\Http\Events\Answer\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $answer = Answer::withTrashed()->findOrFail($this->answer_id);
        
        return $this->user()->can('forceDelete', $answer);

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

        $answer = Answer::withTrashed()->findOrFail($this->answer_id);

        $answer->forceDeleteModel();

        $response = new AnswerResource($answer);

        event(new ForceDeleteEvent($answer, $this->all(), $response));

        return $response;

    }
    
}

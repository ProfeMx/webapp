<?php

namespace App\Http\Requests\Answer;

use App\Models\Answer;
use App\Http\Resources\Models\AnswerResource;
use App\Http\Events\Answer\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', Answer::class);

    }

    public function rules()
    {
        return [
            //
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

        $answer = (new Answer)->createModel($this);

        $response = new AnswerResource($answer);

        event(new CreateEvent($answer, $this, $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use App\Http\Resources\Models\QuestionResource;
use App\Http\Events\Question\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $version = '1.0.0';

        $this->merge([
            'version' => $version,
        ]);
    }

    public function authorize()
    {
        return $this->user()->can('create', Question::class);
    }

    public function rules()
    {
        return [
            'version' => 'required',
            'type' => [
                'required',
                Rule::in(Question::$allowed_types)
            ],
            // 'order' => 'required',
            'weight' => 'required|numeric',
            'quiz_id' => 'required|numeric|exists:quizzes,id',
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

        $question = (new Question)->createModel($this);

        $response = new QuestionResource($question);

        event(new CreateEvent($question, $this, $response));

        return $response;

    }
    
}

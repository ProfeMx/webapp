<?php

namespace App\Http\Requests\Quiz;

use App\Models\Quiz;
use App\Http\Resources\Models\QuizResource;
use App\Http\Events\Quiz\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {

        $version = '1.0.0';

        $this->merge([
            'version' => $version
        ]);

    }

    public function authorize()
    {

        return $this->user()->can('create', Quiz::class);

    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'version' => 'required',  
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

        $quiz = (new Quiz)->createModel($this);

        $response = new QuizResource($quiz);

        event(new CreateEvent($quiz, $this->all(), $response));

        return $response;

    }
    
}

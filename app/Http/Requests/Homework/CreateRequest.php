<?php

namespace App\Http\Requests\Homework;

use App\Models\Homework;
use App\Http\Resources\Models\HomeworkResource;
use App\Http\Events\Homework\Events\CreateEvent;
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

        return $this->user()->can('create', Homework::class);

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

        $homework = (new Homework)->createModel($this);

        $response = new HomeworkResource($homework);

        event(new CreateEvent($homework, $this, $response));

        return $response;

    }
    
}

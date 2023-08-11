<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use App\Http\Events\Course\Events\CreateEvent;
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

        return true; // QUITAR DESPUÉS

        return $this->user()->can('create', Course::class);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => [
                'required',
                Rule::in((new Course)->allowed_status)
            ]
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

        $course = (new Course)->createModel($this);

        $response = new CourseResource($course);

        event(new CreateEvent($course, $this, $response));

        return $response;

    }
    
}

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
        return $this->user()->can('create', Course::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => [
                'required',
                Rule::in(Course::$allowed_status)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'status.required' => 'El estado es obligatorio.',
            'status.in' => 'El estado seleccionado no es válido.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'status' => 'Estado',
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

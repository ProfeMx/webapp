<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use App\Http\Events\Course\Events\UpdateEvent;
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
        
        $course = Course::findOrFail($this->course_id);

        return $this->user()->can('update', $course);

    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'status' => [
                'nullable',
                Rule::in(Course::$allowed_status)
            ],
            'course_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'status.in' => 'El estado seleccionado no es válido.',
            'course_id.required' => 'El ID del curso es obligatorio.',
            'course_id.numeric' => 'El ID del curso debe ser un valor numérico.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'status' => 'Estado',
            'course_id' => 'ID del Curso',
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $course = Course::findOrFail($this->course_id);

        $course = $course->updateModel($this);

        $response = new CourseResource($course);

        event(new UpdateEvent($course, $this, $response));

        return $response;

    }

}

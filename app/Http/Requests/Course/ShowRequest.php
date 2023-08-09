<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $course = Course::findOrFail($this->course_id);

        return $this->user()->can('view', $course);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Course)->loadable_relations)
            ],
            'course_id' => 'required|numeric'
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

        $course = Course::where('id', $this->course_id)
            ->with($this->load_relations ?? [])
            ->firstOrFail();

        return new CourseResource($course);

    }
    
}

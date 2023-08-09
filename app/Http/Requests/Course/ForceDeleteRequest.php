<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use App\Http\Events\Course\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $course = Course::withTrashed()->findOrFail($this->course_id);
        
        return $this->user()->can('forceDelete', $course);

    }

    public function rules()
    {
        return [
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

        $course = Course::withTrashed()->findOrFail($this->course_id);

        $course->forceDeleteModel();

        $response = new CourseResource($course);

        event(new ForceDeleteEvent($course, $this, $response));

        return $response;

    }
    
}

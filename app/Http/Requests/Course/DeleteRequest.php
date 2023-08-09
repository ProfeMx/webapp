<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use App\Http\Events\Course\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $course = Course::findOrFail($this->course_id);

        return $this->user()->can('delete', $course);

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

        $course = Course::findOrFail($this->course_id);

        $course->deleteModel();

        $response = new CourseResource($course);

        event(new DeleteEvent($course, $this, $response));

        return $response;

    }
    
}

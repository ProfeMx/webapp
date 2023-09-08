<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use App\Http\Events\Course\Events\DeallocatePathEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeallocatePathRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $course = Course::findOrFail($this->course_id);

        return $this->user()->can('deallocatePath', $course);

    }

    public function rules()
    {
        return [
            'path_id' => 'required|numeric',
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

        $course->deallocatePath($this);

        $response = new CourseResource($course);

        event(new DeallocatePathEvent($course, $this->all(), $response));

        return $response;

    }

}

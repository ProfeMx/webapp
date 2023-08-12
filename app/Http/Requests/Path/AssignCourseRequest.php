<?php

namespace App\Http\Requests\Path;

use App\Models\Path;
use App\Http\Resources\Models\PathResource;
use App\Http\Events\Path\Events\AssignCourseEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssignCourseRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $path = Path::findOrFail($this->path_id);

        return $this->user()->can('assignCourse', $path);

    }

    public function rules()
    {
        return [
            'course_id' => 'required|numeric',
            'path_id' => 'required|numeric'
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

        $path = Path::findOrFail($this->path_id);

        $path->assignCourse($this);

        $response = new PathResource($path);

        event(new AssignCourseEvent($path, $this, $response));

        return $response;

    }

}

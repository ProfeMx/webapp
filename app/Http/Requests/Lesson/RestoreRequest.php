<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
use App\Http\Events\Lesson\Events\RestoreEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $lesson = Lesson::withTrashed()->findOrFail($this->lesson_id);
        
        return $this->user()->can('restore', $lesson);

    }

    public function rules()
    {
        return [
            'lesson_id' => 'required|numeric'
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

        $lesson = Lesson::withTrashed()->findOrFail($this->lesson_id);

        $lesson->restoreModel();

        $response = new LessonResource($lesson);

        event(new RestoreEvent($lesson, $this, $response));

        return $response;

    }
    
}

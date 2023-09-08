<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
use App\Http\Events\Lesson\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $lesson = Lesson::withTrashed()->findOrFail($this->lesson_id);
        
        return $this->user()->can('forceDelete', $lesson);

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

        $lesson->forceDeleteModel();

        $response = new LessonResource($lesson);

        event(new ForceDeleteEvent($lesson, $this->all(), $response));

        return $response;

    }
    
}

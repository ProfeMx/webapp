<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
use App\Http\Events\Lesson\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $lesson = Lesson::findOrFail($this->lesson_id);

        return $this->user()->can('delete', $lesson);

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

        $lesson = Lesson::findOrFail($this->lesson_id);

        $lesson->deleteModel();

        $response = new LessonResource($lesson);

        event(new DeleteEvent($lesson, $this, $response));

        return $response;

    }
    
}

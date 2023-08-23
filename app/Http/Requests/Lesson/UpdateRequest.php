<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
use App\Http\Events\Lesson\Events\UpdateEvent;
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
        
        $lesson = Lesson::findOrFail($this->lesson_id);

        return $this->user()->can('update', $lesson);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
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

        $lesson = $lesson->updateModel($this);

        $response = new LessonResource($lesson);

        event(new UpdateEvent($lesson, $this, $response));

        return $response;

    }

}

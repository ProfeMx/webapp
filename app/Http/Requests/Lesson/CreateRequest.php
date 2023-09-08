<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
use App\Http\Events\Lesson\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', Lesson::class);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'section_id' => 'required|numeric|exists:sections,id',
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

        $lesson = (new Lesson)->createModel($this);

        $response = new LessonResource($lesson);

        event(new CreateEvent($lesson, $this->all(), $response));

        return $response;

    }
    
}

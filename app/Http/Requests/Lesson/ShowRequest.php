<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
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

        if(auth()->check()) {

            $lesson = Lesson::findOrFail($this->lesson_id);

            return $this->user()->can('view', $lesson);

        } else {

            return true;

        }

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Lesson)->loadable_relations)
            ],
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

        $lesson = Lesson::where('id', $this->lesson_id)
            ->with($this->load_relations ?? [])
            ->firstOrFail();

        return new LessonResource($lesson);

    }
    
}

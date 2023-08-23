<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
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

        $section = Section::findOrFail($this->section_id);

        if(auth()->check()) {

            return $this->user()->can('view', $section);

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
                Rule::in((new Section)->loadable_relations)
            ],
            'section_id' => 'required|numeric'
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

        $section = Section::where('id', $this->section_id)
            ->with($this->load_relations ?? [])
            ->firstOrFail();

        return new SectionResource($section);

    }
    
}

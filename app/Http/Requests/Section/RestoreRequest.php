<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
use App\Http\Events\Section\Events\RestoreEvent;
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
        
        $section = Section::withTrashed()->findOrFail($this->section_id);
        
        return $this->user()->can('restore', $section);

    }

    public function rules()
    {
        return [
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

        $section = Section::withTrashed()->findOrFail($this->section_id);

        $section->restoreModel();

        $response = new SectionResource($section);

        event(new RestoreEvent($section, $this->all(), $response));

        return $response;

    }
    
}

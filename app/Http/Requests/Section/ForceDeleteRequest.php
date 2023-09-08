<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
use App\Http\Events\Section\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $section = Section::withTrashed()->findOrFail($this->section_id);
        
        return $this->user()->can('forceDelete', $section);

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

        $section->forceDeleteModel();

        $response = new SectionResource($section);

        event(new ForceDeleteEvent($section, $this->all(), $response));

        return $response;

    }
    
}

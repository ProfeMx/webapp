<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
use App\Http\Events\Section\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $section = Section::findOrFail($this->section_id);

        return $this->user()->can('delete', $section);

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

        $section = Section::findOrFail($this->section_id);

        $section->deleteModel();

        $response = new SectionResource($section);

        event(new DeleteEvent($section, $this->all(), $response));

        return $response;

    }
    
}

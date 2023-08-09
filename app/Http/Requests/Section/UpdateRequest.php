<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
use App\Http\Events\Section\Events\UpdateEvent;
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
        
        $section = Section::findOrFail($this->section_id);

        return $this->user()->can('update', $section);

    }

    public function rules()
    {
        return [
            //
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

        $section = $section->updateModel($this);

        $response = new SectionResource($section);

        event(new UpdateEvent($section, $this, $response));

        return $response;

    }

}

<?php

namespace App\Http\Requests\Path;

use App\Models\Path;
use App\Http\Resources\Models\PathResource;
use App\Http\Events\Path\Events\AssignCareerEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssignCareerRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $path = Path::findOrFail($this->path_id);

        return $this->user()->can('assignCareer', $path);

    }

    public function rules()
    {
        return [
            'career_id' => 'required|numeric',
            'path_id' => 'required|numeric'
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

        $path = Path::findOrFail($this->path_id);

        $path->assignCareer($this);

        $response = new PathResource($path);

        event(new AssignCareerEvent($path, $this->all(), $response));

        return $response;

    }

}

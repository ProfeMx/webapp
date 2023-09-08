<?php

namespace App\Http\Requests\Path;

use App\Models\Path;
use App\Http\Resources\Models\PathResource;
use App\Http\Events\Path\Events\RestoreEvent;
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
        
        $path = Path::withTrashed()->findOrFail($this->path_id);
        
        return $this->user()->can('restore', $path);

    }

    public function rules()
    {
        return [
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

        $path = Path::withTrashed()->findOrFail($this->path_id);

        $path->restoreModel();

        $response = new PathResource($path);

        event(new RestoreEvent($path, $this->all(), $response));

        return $response;

    }
    
}

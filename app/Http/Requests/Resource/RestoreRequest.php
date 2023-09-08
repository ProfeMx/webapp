<?php

namespace App\Http\Requests\Resource;

use App\Models\Resource;
use App\Http\Resources\Models\ResourceResource;
use App\Http\Events\Resource\Events\RestoreEvent;
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
        
        $resource = Resource::withTrashed()->findOrFail($this->resource_id);
        
        return $this->user()->can('restore', $resource);

    }

    public function rules()
    {
        return [
            'resource_id' => 'required|numeric'
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

        $resource = Resource::withTrashed()->findOrFail($this->resource_id);

        $resource->restoreModel();

        $response = new ResourceResource($resource);

        event(new RestoreEvent($resource, $this->all(), $response));

        return $response;

    }
    
}

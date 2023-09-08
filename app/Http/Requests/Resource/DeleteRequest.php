<?php

namespace App\Http\Requests\Resource;

use App\Models\Resource;
use App\Http\Resources\Models\ResourceResource;
use App\Http\Events\Resource\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $resource = Resource::findOrFail($this->resource_id);

        return $this->user()->can('delete', $resource);

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

        $resource = Resource::findOrFail($this->resource_id);

        $resource->deleteModel();

        $response = new ResourceResource($resource);

        event(new DeleteEvent($resource, $this->all(), $response));

        return $response;

    }
    
}

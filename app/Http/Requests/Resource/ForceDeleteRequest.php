<?php

namespace App\Http\Requests\Resource;

use App\Models\Resource;
use App\Http\Resources\Models\ResourceResource;
use App\Http\Events\Resource\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $resource = Resource::withTrashed()->findOrFail($this->resource_id);
        
        return $this->user()->can('forceDelete', $resource);

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

        $resource->forceDeleteModel();

        $response = new ResourceResource($resource);

        event(new ForceDeleteEvent($resource, $this, $response));

        return $response;

    }
    
}

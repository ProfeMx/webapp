<?php

namespace App\Http\Requests\Resource;

use App\Models\Resource;
use App\Http\Resources\Models\ResourceResource;
use App\Http\Events\Resource\Events\UpdateEvent;
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
        
        $resource = Resource::findOrFail($this->resource_id);

        return $this->user()->can('update', $resource);

    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'status' => [
                'nullable',
                Rule::in(Resource::$allowed_status)
            ],
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

        $resource = $resource->updateModel($this);

        $response = new ResourceResource($resource);

        event(new UpdateEvent($resource, $this, $response));

        return $response;

    }

}

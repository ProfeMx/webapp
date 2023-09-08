<?php

namespace App\Http\Requests\Resource;

use App\Models\Resource;
use App\Http\Resources\Models\ResourceResource;
use App\Http\Events\Resource\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $order = Resource::where('course_id', $this->course_id)->count();

        // Es posible que en este apartado se tenga que definir las propiedades de 
            // - resourceable_id 
            // - resourceable_type

        $this->merge([
            'order' => ++$order
        ]);

    }

    public function authorize()
    {

        return $this->user()->can('create', Resource::class);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => [
                'required',
                Rule::in(Resource::$allowed_types)
            ],
            'status' => [
                'required',
                Rule::in(Resource::$allowed_status)
            ],
            'order' => 'required|numeric',
            'lesson_id' => 'required|numeric|exists:lessons,id',
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

        $resource = (new Resource)->createModel($this);

        $response = new ResourceResource($resource);

        event(new CreateEvent($resource, $this->all(), $response));

        return $response;

    }
    
}

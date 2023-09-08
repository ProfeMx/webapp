<?php

namespace App\Http\Requests\Path;

use App\Models\Path;
use App\Http\Resources\Models\PathResource;
use App\Http\Events\Path\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $path = Path::findOrFail($this->path_id);

        return $this->user()->can('delete', $path);

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

        $path = Path::findOrFail($this->path_id);

        $path->deleteModel();

        $response = new PathResource($path);

        event(new DeleteEvent($path, $this->all(), $response));

        return $response;

    }
    
}

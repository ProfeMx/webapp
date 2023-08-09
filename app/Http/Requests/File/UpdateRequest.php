<?php

namespace App\Http\Requests\File;

use App\Models\File;
use App\Http\Resources\Models\FileResource;
use App\Http\Events\File\Events\UpdateEvent;
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
        
        $file = File::findOrFail($this->file_id);

        return $this->user()->can('update', $file);

    }

    public function rules()
    {
        return [
            //
            'file_id' => 'required|numeric'
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

        $file = File::findOrFail($this->file_id);

        $file = $file->updateModel($this);

        $response = new FileResource($file);

        event(new UpdateEvent($file, $this, $response));

        return $response;

    }

}

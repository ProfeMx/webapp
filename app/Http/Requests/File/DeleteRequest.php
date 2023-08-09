<?php

namespace App\Http\Requests\File;

use App\Models\File;
use App\Http\Resources\Models\FileResource;
use App\Http\Events\File\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $file = File::findOrFail($this->file_id);

        return $this->user()->can('delete', $file);

    }

    public function rules()
    {
        return [
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

        $file->deleteModel();

        $response = new FileResource($file);

        event(new DeleteEvent($file, $this, $response));

        return $response;

    }
    
}

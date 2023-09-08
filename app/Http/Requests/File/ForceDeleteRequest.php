<?php

namespace App\Http\Requests\File;

use App\Models\File;
use App\Http\Resources\Models\FileResource;
use App\Http\Events\File\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $file = File::withTrashed()->findOrFail($this->file_id);
        
        return $this->user()->can('forceDelete', $file);

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

        $file = File::withTrashed()->findOrFail($this->file_id);

        $file->forceDeleteModel();

        $response = new FileResource($file);

        event(new ForceDeleteEvent($file, $this->all(), $response));

        return $response;

    }
    
}

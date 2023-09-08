<?php

namespace App\Http\Requests\File;

use App\Models\File;
use App\Http\Resources\Models\FileResource;
use App\Http\Events\File\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', File::class);

    }

    public function rules()
    {
        return [
            //
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

        $file = (new File)->createModel($this);

        $response = new FileResource($file);

        event(new CreateEvent($file, $this->all(), $response));

        return $response;

    }
    
}

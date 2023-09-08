<?php

namespace App\Http\Requests\Certificate;

use App\Models\Certificate;
use App\Http\Resources\Models\CertificateResource;
use App\Http\Events\Certificate\Events\RestoreEvent;
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
        
        $certificate = Certificate::withTrashed()->findOrFail($this->certificate_id);
        
        return $this->user()->can('restore', $certificate);

    }

    public function rules()
    {
        return [
            'certificate_id' => 'required|numeric'
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

        $certificate = Certificate::withTrashed()->findOrFail($this->certificate_id);

        $certificate->restoreModel();

        $response = new CertificateResource($certificate);

        event(new RestoreEvent($certificate, $this->all(), $response));

        return $response;

    }
    
}

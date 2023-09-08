<?php

namespace App\Http\Requests\Certificate;

use App\Models\Certificate;
use App\Http\Resources\Models\CertificateResource;
use App\Http\Events\Certificate\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        /** Acá mismo se debe considerar si se puede actualizar algo de esto:
         *  - grade
         *  - dedication
         *  - template, etc.
         */ 
    }

    public function authorize()
    {
        
        $certificate = Certificate::findOrFail($this->certificate_id);

        return $this->user()->can('update', $certificate);

    }

    public function rules()
    {
        return [
            //
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

        $certificate = Certificate::findOrFail($this->certificate_id);

        $certificate = $certificate->updateModel($this);

        $response = new CertificateResource($certificate);

        event(new UpdateEvent($certificate, $this->all(), $response));

        return $response;

    }

}

<?php

namespace App\Http\Requests\Certificate;

use App\Models\Certificate;
use App\Http\Resources\Models\CertificateResource;
use App\Http\Events\Certificate\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $certificate = Certificate::findOrFail($this->certificate_id);

        return $this->user()->can('delete', $certificate);

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

        $certificate = Certificate::findOrFail($this->certificate_id);

        $certificate->deleteModel();

        $response = new CertificateResource($certificate);

        event(new DeleteEvent($certificate, $this->all(), $response));

        return $response;

    }
    
}

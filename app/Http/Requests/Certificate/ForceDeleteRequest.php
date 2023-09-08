<?php

namespace App\Http\Requests\Certificate;

use App\Models\Certificate;
use App\Http\Resources\Models\CertificateResource;
use App\Http\Events\Certificate\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $certificate = Certificate::withTrashed()->findOrFail($this->certificate_id);
        
        return $this->user()->can('forceDelete', $certificate);

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

        $certificate->forceDeleteModel();

        $response = new CertificateResource($certificate);

        event(new ForceDeleteEvent($certificate, $this->all(), $response));

        return $response;

    }
    
}

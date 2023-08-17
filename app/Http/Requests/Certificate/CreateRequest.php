<?php

namespace App\Http\Requests\Certificate;

use App\Models\Certificate;
use App\Http\Resources\Models\CertificateResource;
use App\Http\Events\Certificate\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {

        /** En este campo se deberán considerar los valores que se requieran para el payload del certificado
         *  - grade
         *  - dedication
         *  - template, etc.
         */ 

        $this->merge([

            'code' => $this->generateUniqueCode(10)

        ]);
    }

    public function authorize()
    {

        return $this->user()->can('create', Certificate::class);

    }

    public function rules()
    {
        return [
            'code' => 'required|string',
            'enrollment_id' => 'required|numeric|exists:enrollments,id'
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

        $certificate = (new Certificate)->createModel($this);

        $response = new CertificateResource($certificate);

        event(new CreateEvent($certificate, $this, $response));

        return $response;

    }

    private function generateUniqueCode($length) {
    
        $code = Str::random($length);

        // Verificar si el código ya existe en la base de datos
        while (Certificate::where('code', $code)->exists()) {

            $code = Str::random($length);

        }

        return $code;

    }
    
}

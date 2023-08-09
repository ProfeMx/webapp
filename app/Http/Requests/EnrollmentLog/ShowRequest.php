<?php

namespace App\Http\Requests\EnrollmentLog;

use App\Models\EnrollmentLog;
use App\Http\Resources\Models\EnrollmentLogResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $enrollmentLog = EnrollmentLog::findOrFail($this->enrollment_log_id);

        return $this->user()->can('view', $enrollmentLog);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new EnrollmentLog)->loadable_relations)
            ],
            'enrollment_log_id' => 'required|numeric'
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

        $enrollmentLog = EnrollmentLog::where('id', $this->enrollment_log_id)
            ->with($this->load_relations ?? [])
            ->firstOrFail();

        return new EnrollmentLogResource($enrollmentLog);

    }
    
}

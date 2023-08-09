<?php

namespace App\Http\Requests\EnrollmentLog;

use App\Models\EnrollmentLog;
use App\Http\Resources\Models\EnrollmentLogResource;
use App\Http\Events\EnrollmentLog\Events\RestoreEvent;
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
        
        $enrollmentLog = EnrollmentLog::withTrashed()->findOrFail($this->enrollment_log_id);
        
        return $this->user()->can('restore', $enrollmentLog);

    }

    public function rules()
    {
        return [
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

        $enrollmentLog = EnrollmentLog::withTrashed()->findOrFail($this->enrollment_log_id);

        $enrollmentLog->restoreModel();

        $response = new EnrollmentLogResource($enrollmentLog);

        event(new RestoreEvent($enrollmentLog, $this, $response));

        return $response;

    }
    
}

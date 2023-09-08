<?php

namespace App\Http\Requests\EnrollmentLog;

use App\Models\EnrollmentLog;
use App\Http\Resources\Models\EnrollmentLogResource;
use App\Http\Events\EnrollmentLog\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $enrollmentLog = EnrollmentLog::findOrFail($this->enrollment_log_id);

        return $this->user()->can('delete', $enrollmentLog);

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

        $enrollmentLog = EnrollmentLog::findOrFail($this->enrollment_log_id);

        $enrollmentLog->deleteModel();

        $response = new EnrollmentLogResource($enrollmentLog);

        event(new DeleteEvent($enrollmentLog, $this->all(), $response));

        return $response;

    }
    
}

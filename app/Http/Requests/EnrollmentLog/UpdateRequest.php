<?php

namespace App\Http\Requests\EnrollmentLog;

use App\Models\EnrollmentLog;
use App\Http\Resources\Models\EnrollmentLogResource;
use App\Http\Events\EnrollmentLog\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $enrollmentLog = EnrollmentLog::findOrFail($this->enrollment_log_id);

        return $this->user()->can('update', $enrollmentLog);

    }

    public function rules()
    {
        return [
            'type' => 'required',
            'dedication' => 'required',
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

        $enrollmentLog = $enrollmentLog->updateModel($this);

        $response = new EnrollmentLogResource($enrollmentLog);

        event(new UpdateEvent($enrollmentLog, $this, $response));

        return $response;

    }

}

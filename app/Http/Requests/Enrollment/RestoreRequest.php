<?php

namespace App\Http\Requests\Enrollment;

use App\Models\Enrollment;
use App\Http\Resources\Models\EnrollmentResource;
use App\Http\Events\Enrollment\Events\RestoreEvent;
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
        
        $enrollment = Enrollment::withTrashed()->findOrFail($this->enrollment_id);
        
        return $this->user()->can('restore', $enrollment);

    }

    public function rules()
    {
        return [
            'enrollment_id' => 'required|numeric'
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

        $enrollment = Enrollment::withTrashed()->findOrFail($this->enrollment_id);

        $enrollment->restoreModel();

        $response = new EnrollmentResource($enrollment);

        event(new RestoreEvent($enrollment, $this, $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\Enrollment;

use App\Models\Enrollment;
use App\Http\Resources\Models\EnrollmentResource;
use App\Http\Events\Enrollment\Events\UpdateEvent;
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
        
        $enrollment = Enrollment::findOrFail($this->enrollment_id);

        return $this->user()->can('update', $enrollment);

    }

    public function rules()
    {
        return [
            //
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

        $enrollment = Enrollment::findOrFail($this->enrollment_id);

        $enrollment = $enrollment->updateModel($this);

        $response = new EnrollmentResource($enrollment);

        event(new UpdateEvent($enrollment, $this, $response));

        return $response;

    }

}

<?php

namespace App\Http\Requests\Enrollment;

use App\Models\Enrollment;
use App\Http\Resources\Models\EnrollmentResource;
use App\Http\Events\Enrollment\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $enrollment = Enrollment::findOrFail($this->enrollment_id);

        return $this->user()->can('delete', $enrollment);

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

        $enrollment = Enrollment::findOrFail($this->enrollment_id);

        $enrollment->deleteModel();

        $response = new EnrollmentResource($enrollment);

        event(new DeleteEvent($enrollment, $this->all(), $response));

        return $response;

    }
    
}

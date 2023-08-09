<?php

namespace App\Http\Requests\Submission;

use App\Models\Submission;
use App\Http\Resources\Models\SubmissionResource;
use App\Http\Events\Submission\Events\RestoreEvent;
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
        
        $submission = Submission::withTrashed()->findOrFail($this->submission_id);
        
        return $this->user()->can('restore', $submission);

    }

    public function rules()
    {
        return [
            'submission_id' => 'required|numeric'
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

        $submission = Submission::withTrashed()->findOrFail($this->submission_id);

        $submission->restoreModel();

        $response = new SubmissionResource($submission);

        event(new RestoreEvent($submission, $this, $response));

        return $response;

    }
    
}

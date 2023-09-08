<?php

namespace App\Http\Requests\Submission;

use App\Models\Submission;
use App\Http\Resources\Models\SubmissionResource;
use App\Http\Events\Submission\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $submission = Submission::withTrashed()->findOrFail($this->submission_id);
        
        return $this->user()->can('forceDelete', $submission);

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

        $submission->forceDeleteModel();

        $response = new SubmissionResource($submission);

        event(new ForceDeleteEvent($submission, $this->all(), $response));

        return $response;

    }
    
}

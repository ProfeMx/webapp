<?php

namespace App\Http\Requests\Submission;

use App\Models\Submission;
use App\Http\Resources\Models\SubmissionResource;
use App\Http\Events\Submission\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $submission = Submission::findOrFail($this->submission_id);

        return $this->user()->can('delete', $submission);

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

        $submission = Submission::findOrFail($this->submission_id);

        $submission->deleteModel();

        $response = new SubmissionResource($submission);

        event(new DeleteEvent($submission, $this->all(), $response));

        return $response;

    }
    
}

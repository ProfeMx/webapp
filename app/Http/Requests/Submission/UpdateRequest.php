<?php

namespace App\Http\Requests\Submission;

use App\Models\Submission;
use App\Http\Resources\Models\SubmissionResource;
use App\Http\Events\Submission\Events\UpdateEvent;
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
        
        $submission = Submission::findOrFail($this->submission_id);

        return $this->user()->can('update', $submission);

    }

    public function rules()
    {
        return [
            //
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

        $submission = $submission->updateModel($this);

        $response = new SubmissionResource($submission);

        event(new UpdateEvent($submission, $this, $response));

        return $response;

    }

}

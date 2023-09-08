<?php

namespace App\Http\Requests\Submission;

use App\Models\Submission;
use App\Http\Resources\Models\SubmissionResource;
use App\Http\Events\Submission\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', Submission::class);

    }

    public function rules()
    {
        return [
            'status' => [
                'required',
                Rule::in(Submission::$allowed_status)
            ],
            'content' => 'nullable|string|max:10000',
            'submission_file' => 'nullable|file|max:20480', // 'storage/files/sknvkjsndf.pdf'
            'homework_id' => 'required|integer|exists:homeworks,id',
            'enrollment_id' => 'required|integer|exists:homeworks,id',
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

        $submission = (new Submission)->createModel($this);

        $response = new SubmissionResource($submission);

        event(new CreateEvent($submission, $this->all(), $response));

        return $response;

    }
    
}

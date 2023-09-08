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
        /**
         * En caso de que el envio sea de tipo archivo, o que el request tenga un archivo
         * se deberá procesar su sibida y almacenar en la variable submission_file
         **/
    }

    public function authorize()
    {
        
        $submission = Submission::findOrFail($this->submission_id);

        return $this->user()->can('update', $submission);

    }

    public function rules()
    {
        return [
            'content' => 'nullable|string|max:10000',
            'submission_file' => 'nullable|file|max:2048',
            'grade_override' => 'nullable|numeric', // PENDIENTE: Esto solo lo puede actualizar un docente.
            'feedback_file' => 'nullable|string|1500', // PENDIENTE: Esto solo lo puede actualizar un docente.
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

        event(new UpdateEvent($submission, $this->all(), $response));

        return $response;

    }

}

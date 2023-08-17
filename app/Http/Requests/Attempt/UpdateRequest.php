<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use App\Http\Resources\Models\AttemptResource;
use App\Http\Events\Attempt\Events\UpdateEvent;
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
        
        $attempt = Attempt::findOrFail($this->attempt_id);

        return $this->user()->can('update', $attempt);

    }

    public function rules()
    {
        return [
            'weight' => 'required|numeric',
            'grade_override' => 'required|numeric',
            'feedback_override' => 'required|string',
            'attempt_id' => 'required|numeric'
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

        $attempt = Attempt::findOrFail($this->attempt_id);

        $attempt = $attempt->updateModel($this);

        $response = new AttemptResource($attempt);

        event(new UpdateEvent($attempt, $this, $response));

        return $response;

    }

}

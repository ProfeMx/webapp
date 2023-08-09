<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use App\Http\Resources\Models\AttemptResource;
use App\Http\Events\Attempt\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $attempt = Attempt::findOrFail($this->attempt_id);

        return $this->user()->can('delete', $attempt);

    }

    public function rules()
    {
        return [
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

        $attempt->deleteModel();

        $response = new AttemptResource($attempt);

        event(new DeleteEvent($attempt, $this, $response));

        return $response;

    }
    
}

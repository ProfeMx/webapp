<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use App\Http\Resources\Models\AttemptResource;
use App\Http\Events\Attempt\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $attempt = Attempt::withTrashed()->findOrFail($this->attempt_id);
        
        return $this->user()->can('forceDelete', $attempt);

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

        $attempt = Attempt::withTrashed()->findOrFail($this->attempt_id);

        $attempt->forceDeleteModel();

        $response = new AttemptResource($attempt);

        event(new ForceDeleteEvent($attempt, $this->all(), $response));

        return $response;

    }
    
}

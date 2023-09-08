<?php

namespace App\Http\Requests\Career;

use App\Models\Career;
use App\Http\Resources\Models\CareerResource;
use App\Http\Events\Career\Events\RestoreEvent;
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
        
        $career = Career::withTrashed()->findOrFail($this->career_id);
        
        return $this->user()->can('restore', $career);

    }

    public function rules()
    {
        return [
            'career_id' => 'required|numeric'
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

        $career = Career::withTrashed()->findOrFail($this->career_id);

        $career->restoreModel();

        $response = new CareerResource($career);

        event(new RestoreEvent($career, $this->all(), $response));

        return $response;

    }
    
}

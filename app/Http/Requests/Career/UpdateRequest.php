<?php

namespace App\Http\Requests\Career;

use App\Models\Career;
use App\Http\Resources\Models\CareerResource;
use App\Http\Events\Career\Events\UpdateEvent;
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
        
        $career = Career::findOrFail($this->career_id);

        return $this->user()->can('update', $career);

    }

    public function rules()
    {
        return [
            //
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

        $career = Career::findOrFail($this->career_id);

        $career = $career->updateModel($this);

        $response = new CareerResource($career);

        event(new UpdateEvent($career, $this, $response));

        return $response;

    }

}

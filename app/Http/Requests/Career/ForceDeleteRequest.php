<?php

namespace App\Http\Requests\Career;

use App\Models\Career;
use App\Http\Resources\Models\CareerResource;
use App\Http\Events\Career\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $career = Career::withTrashed()->findOrFail($this->career_id);
        
        return $this->user()->can('forceDelete', $career);

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

        $career->forceDeleteModel();

        $response = new CareerResource($career);

        event(new ForceDeleteEvent($career, $this->all(), $response));

        return $response;

    }
    
}

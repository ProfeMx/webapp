<?php

namespace App\Http\Requests\Career;

use App\Models\Career;
use App\Http\Resources\Models\CareerResource;
use App\Http\Events\Career\Events\DeallocatePathEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeallocatePathRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $career = Career::findOrFail($this->career_id);

        return $this->user()->can('deallocatePath', $career);

    }

    public function rules()
    {
        return [
            'path_id' => 'required|numeric',
            'career_id' => 'required|numeric',
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

        $career->deallocatePath($this);

        $response = new CareerResource($career);

        event(new DeallocatePathEvent($career, $this->all(), $response));

        return $response;

    }

}

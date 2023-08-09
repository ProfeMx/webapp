<?php

namespace App\Http\Requests\Homework;

use App\Models\Homework;
use App\Http\Resources\Models\HomeworkResource;
use App\Http\Events\Homework\Events\RestoreEvent;
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
        
        $homework = Homework::withTrashed()->findOrFail($this->homework_id);
        
        return $this->user()->can('restore', $homework);

    }

    public function rules()
    {
        return [
            'homework_id' => 'required|numeric'
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

        $homework = Homework::withTrashed()->findOrFail($this->homework_id);

        $homework->restoreModel();

        $response = new HomeworkResource($homework);

        event(new RestoreEvent($homework, $this, $response));

        return $response;

    }
    
}

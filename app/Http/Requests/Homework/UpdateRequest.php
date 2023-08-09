<?php

namespace App\Http\Requests\Homework;

use App\Models\Homework;
use App\Http\Resources\Models\HomeworkResource;
use App\Http\Events\Homework\Events\UpdateEvent;
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
        
        $homework = Homework::findOrFail($this->homework_id);

        return $this->user()->can('update', $homework);

    }

    public function rules()
    {
        return [
            //
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

        $homework = Homework::findOrFail($this->homework_id);

        $homework = $homework->updateModel($this);

        $response = new HomeworkResource($homework);

        event(new UpdateEvent($homework, $this, $response));

        return $response;

    }

}

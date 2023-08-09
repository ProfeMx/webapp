<?php

namespace App\Http\Requests\Homework;

use App\Models\Homework;
use App\Http\Resources\Models\HomeworkResource;
use App\Http\Events\Homework\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $homework = Homework::withTrashed()->findOrFail($this->homework_id);
        
        return $this->user()->can('forceDelete', $homework);

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

        $homework->forceDeleteModel();

        $response = new HomeworkResource($homework);

        event(new ForceDeleteEvent($homework, $this, $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use App\Http\Resources\Models\ActivityResource;
use App\Http\Events\Activity\Events\UpdateEvent;
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
        
        $activity = Activity::findOrFail($this->activity_id);

        return $this->user()->can('update', $activity);

    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'status' => [
                'nullable',
                Rule::in((new Activity)->allowed_status)
            ],
            'weight' => 'nullable|numeric', 
            'activity_id' => 'required|numeric'
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

        $activity = Activity::findOrFail($this->activity_id);

        $activity = $activity->updateModel($this);

        $response = new ActivityResource($activity);

        event(new UpdateEvent($activity, $this, $response));

        return $response;

    }

}

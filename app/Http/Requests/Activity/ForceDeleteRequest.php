<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use App\Http\Resources\Models\ActivityResource;
use App\Http\Events\Activity\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $activity = Activity::withTrashed()->findOrFail($this->activity_id);
        
        return $this->user()->can('forceDelete', $activity);

    }

    public function rules()
    {
        return [
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

        $activity = Activity::withTrashed()->findOrFail($this->activity_id);

        $activity->forceDeleteModel();

        $response = new ActivityResource($activity);

        event(new ForceDeleteEvent($activity, $this, $response));

        return $response;

    }
    
}

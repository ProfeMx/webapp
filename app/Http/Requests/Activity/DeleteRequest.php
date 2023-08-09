<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use App\Http\Resources\Models\ActivityResource;
use App\Http\Events\Activity\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $activity = Activity::findOrFail($this->activity_id);

        return $this->user()->can('delete', $activity);

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

        $activity = Activity::findOrFail($this->activity_id);

        $activity->deleteModel();

        $response = new ActivityResource($activity);

        event(new DeleteEvent($activity, $this, $response));

        return $response;

    }
    
}

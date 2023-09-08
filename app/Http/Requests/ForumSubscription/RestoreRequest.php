<?php

namespace App\Http\Requests\ForumSubscription;

use App\Models\ForumSubscription;
use App\Http\Resources\Models\ForumSubscriptionResource;
use App\Http\Events\ForumSubscription\Events\RestoreEvent;
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
        
        $forumSubscription = ForumSubscription::withTrashed()->findOrFail($this->forum_subscription_id);
        
        return $this->user()->can('restore', $forumSubscription);

    }

    public function rules()
    {
        return [
            'forum_subscription_id' => 'required|numeric'
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

        $forumSubscription = ForumSubscription::withTrashed()->findOrFail($this->forum_subscription_id);

        $forumSubscription->restoreModel();

        $response = new ForumSubscriptionResource($forumSubscription);

        event(new RestoreEvent($forumSubscription, $this->all(), $response));

        return $response;

    }
    
}

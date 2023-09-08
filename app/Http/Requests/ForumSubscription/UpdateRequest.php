<?php

namespace App\Http\Requests\ForumSubscription;

use App\Models\ForumSubscription;
use App\Http\Resources\Models\ForumSubscriptionResource;
use App\Http\Events\ForumSubscription\Events\UpdateEvent;
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
        
        $forumSubscription = ForumSubscription::findOrFail($this->forum_subscription_id);

        return $this->user()->can('update', $forumSubscription);

    }

    public function rules()
    {
        return [
            'status' => [
                'required',
                Rule::in(ForumSubscription::$allowed_status)
            ],
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

        $forumSubscription = ForumSubscription::findOrFail($this->forum_subscription_id);

        $forumSubscription = $forumSubscription->updateModel($this);

        $response = new ForumSubscriptionResource($forumSubscription);

        event(new UpdateEvent($forumSubscription, $this->all(), $response));

        return $response;

    }

}

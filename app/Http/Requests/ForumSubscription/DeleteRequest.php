<?php

namespace App\Http\Requests\ForumSubscription;

use App\Models\ForumSubscription;
use App\Http\Resources\Models\ForumSubscriptionResource;
use App\Http\Events\ForumSubscription\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $forumSubscription = ForumSubscription::findOrFail($this->forum_subscription_id);

        return $this->user()->can('delete', $forumSubscription);

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

        $forumSubscription = ForumSubscription::findOrFail($this->forum_subscription_id);

        $forumSubscription->deleteModel();

        $response = new ForumSubscriptionResource($forumSubscription);

        event(new DeleteEvent($forumSubscription, $this->all(), $response));

        return $response;

    }
    
}

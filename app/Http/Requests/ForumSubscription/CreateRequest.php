<?php

namespace App\Http\Requests\ForumSubscription;

use App\Models\ForumSubscription;
use App\Http\Resources\Models\ForumSubscriptionResource;
use App\Http\Events\ForumSubscription\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ForumSubscription::class);

    }

    public function rules()
    {
        return [
            'status' => [
                'required',
                Rule::in(ForumSubscription::$allowed_status)
            ],
            'user_id' => 'required|numeric|exists:users,id',
            'subscriptionable_id' => 'required|numeric',
            'subscriptionable_type' => [
                'required',
                Rule::in(ForumSubscription::$allowed_subscriptionables)
            ],
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

        $forumSubscription = (new ForumSubscription)->createModel($this);

        $response = new ForumSubscriptionResource($forumSubscription);

        event(new CreateEvent($forumSubscription, $this->all(), $response));

        return $response;

    }
    
}

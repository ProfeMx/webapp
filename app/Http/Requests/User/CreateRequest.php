<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use App\Http\Events\User\Events\CreateEvent;
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

        return $this->user()->can('create', User::class);

    }

    public function rules()
    {
        return [
            //
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

        $user = (new User)->createModel($this);

        $response = new UserResource($user);

        event(new CreateEvent($user, $this, $response));

        return $response;

    }
    
}

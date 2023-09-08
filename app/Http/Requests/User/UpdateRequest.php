<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use App\Http\Events\User\Events\UpdateEvent;
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
        
        $user = User::findOrFail($this->user_id);

        return $this->user()->can('update', $user);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'user_id' => 'required|numeric'
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

        $user = User::findOrFail($this->user_id);

        $user = $user->updateModel($this);

        $response = new UserResource($user);

        event(new UpdateEvent($user, $this->all(), $response));

        return $response;

    }

}

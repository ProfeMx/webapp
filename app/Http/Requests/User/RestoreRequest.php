<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use App\Http\Events\User\Events\RestoreEvent;
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
        
        $user = User::withTrashed()->findOrFail($this->user_id);
        
        return $this->user()->can('restore', $user);

    }

    public function rules()
    {
        return [
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

        $user = User::withTrashed()->findOrFail($this->user_id);

        $user->restoreModel();

        $response = new UserResource($user);

        event(new RestoreEvent($user, $this->all(), $response));

        return $response;

    }
    
}

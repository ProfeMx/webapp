<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use App\Http\Events\User\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $user = User::withTrashed()->findOrFail($this->user_id);
        
        return $this->user()->can('forceDelete', $user);

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

        $user->forceDeleteModel();

        $response = new UserResource($user);

        event(new ForceDeleteEvent($user, $this, $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use App\Http\Events\User\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $user = User::findOrFail($this->user_id);

        return $this->user()->can('delete', $user);

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

        $user = User::findOrFail($this->user_id);

        $user->deleteModel();

        $response = new UserResource($user);

        event(new DeleteEvent($user, $this, $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $user = User::findOrFail($this->user_id);

        return $this->user()->can('view', $user);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new User)->loadable_relations)
            ],
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

        $user = User::where('id', $this->user_id)
            ->with($this->load_relations ?? [])
            ->firstOrFail();

        return new UserResource($user);

    }
    
}

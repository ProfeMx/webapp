<?php

namespace App\Http\Requests\ThreadReply;

use App\Models\ThreadReply;
use App\Http\Resources\Models\ThreadReplyResource;
use App\Http\Events\ThreadReply\Events\CreateEvent;
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

        return $this->user()->can('create', ThreadReply::class);

    }

    public function rules()
    {
        return [
            'content' => 'required|string|max:3000',
            'thread_id' => 'required|numeric|exists:thread_replies,id',
            'user_id' => 'required|numeric|exists:users,id',
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

        $threadReply = (new ThreadReply)->createModel($this);

        $response = new ThreadReplyResource($threadReply);

        event(new CreateEvent($threadReply, $this, $response));

        return $response;

    }
    
}

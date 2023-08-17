<?php

namespace App\Http\Requests\ThreadReply;

use App\Models\ThreadReply;
use App\Http\Resources\Models\ThreadReplyResource;
use App\Http\Events\ThreadReply\Events\UpdateEvent;
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
        
        $threadReply = ThreadReply::findOrFail($this->thread_reply_id);

        return $this->user()->can('update', $threadReply);

    }

    public function rules()
    {
        return [
            'content' => 'required|string|max:3000',
            'thread_reply_id' => 'required|numeric'
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

        $threadReply = ThreadReply::findOrFail($this->thread_reply_id);

        $threadReply = $threadReply->updateModel($this);

        $response = new ThreadReplyResource($threadReply);

        event(new UpdateEvent($threadReply, $this, $response));

        return $response;

    }

}

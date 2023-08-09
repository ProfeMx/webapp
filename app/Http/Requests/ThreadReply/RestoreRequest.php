<?php

namespace App\Http\Requests\ThreadReply;

use App\Models\ThreadReply;
use App\Http\Resources\Models\ThreadReplyResource;
use App\Http\Events\ThreadReply\Events\RestoreEvent;
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
        
        $threadReply = ThreadReply::withTrashed()->findOrFail($this->thread_reply_id);
        
        return $this->user()->can('restore', $threadReply);

    }

    public function rules()
    {
        return [
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

        $threadReply = ThreadReply::withTrashed()->findOrFail($this->thread_reply_id);

        $threadReply->restoreModel();

        $response = new ThreadReplyResource($threadReply);

        event(new RestoreEvent($threadReply, $this, $response));

        return $response;

    }
    
}

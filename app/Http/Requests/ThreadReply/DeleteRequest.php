<?php

namespace App\Http\Requests\ThreadReply;

use App\Models\ThreadReply;
use App\Http\Resources\Models\ThreadReplyResource;
use App\Http\Events\ThreadReply\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $threadReply = ThreadReply::findOrFail($this->thread_reply_id);

        return $this->user()->can('delete', $threadReply);

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

        $threadReply = ThreadReply::findOrFail($this->thread_reply_id);

        $threadReply->deleteModel();

        $response = new ThreadReplyResource($threadReply);

        event(new DeleteEvent($threadReply, $this->all(), $response));

        return $response;

    }
    
}

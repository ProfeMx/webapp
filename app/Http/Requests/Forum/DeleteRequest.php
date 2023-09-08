<?php

namespace App\Http\Requests\Forum;

use App\Models\Forum;
use App\Http\Resources\Models\ForumResource;
use App\Http\Events\Forum\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $forum = Forum::findOrFail($this->forum_id);

        return $this->user()->can('delete', $forum);

    }

    public function rules()
    {
        return [
            'forum_id' => 'required|numeric'
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

        $forum = Forum::findOrFail($this->forum_id);

        $forum->deleteModel();

        $response = new ForumResource($forum);

        event(new DeleteEvent($forum, $this->all(), $response));

        return $response;

    }
    
}

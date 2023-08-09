<?php

namespace App\Http\Requests\Forum;

use App\Models\Forum;
use App\Http\Resources\Models\ForumResource;
use App\Http\Events\Forum\Events\RestoreEvent;
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
        
        $forum = Forum::withTrashed()->findOrFail($this->forum_id);
        
        return $this->user()->can('restore', $forum);

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

        $forum = Forum::withTrashed()->findOrFail($this->forum_id);

        $forum->restoreModel();

        $response = new ForumResource($forum);

        event(new RestoreEvent($forum, $this, $response));

        return $response;

    }
    
}

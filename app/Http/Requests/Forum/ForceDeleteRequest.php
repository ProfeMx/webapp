<?php

namespace App\Http\Requests\Forum;

use App\Models\Forum;
use App\Http\Resources\Models\ForumResource;
use App\Http\Events\Forum\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $forum = Forum::withTrashed()->findOrFail($this->forum_id);
        
        return $this->user()->can('forceDelete', $forum);

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

        $forum->forceDeleteModel();

        $response = new ForumResource($forum);

        event(new ForceDeleteEvent($forum, $this->all(), $response));

        return $response;

    }
    
}

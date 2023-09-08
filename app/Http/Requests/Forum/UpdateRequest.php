<?php

namespace App\Http\Requests\Forum;

use App\Models\Forum;
use App\Http\Resources\Models\ForumResource;
use App\Http\Events\Forum\Events\UpdateEvent;
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
        
        $forum = Forum::findOrFail($this->forum_id);

        return $this->user()->can('update', $forum);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
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

        $forum = $forum->updateModel($this);

        $response = new ForumResource($forum);

        event(new UpdateEvent($forum, $this->all(), $response));

        return $response;

    }

}

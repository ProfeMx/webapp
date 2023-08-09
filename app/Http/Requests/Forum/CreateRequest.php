<?php

namespace App\Http\Requests\Forum;

use App\Models\Forum;
use App\Http\Resources\Models\ForumResource;
use App\Http\Events\Forum\Events\CreateEvent;
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

        return $this->user()->can('create', Forum::class);

    }

    public function rules()
    {
        return [
            //
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

        $forum = (new Forum)->createModel($this);

        $response = new ForumResource($forum);

        event(new CreateEvent($forum, $this, $response));

        return $response;

    }
    
}

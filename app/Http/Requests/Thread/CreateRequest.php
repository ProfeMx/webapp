<?php

namespace App\Http\Requests\Thread;

use App\Models\Thread;
use App\Http\Resources\Models\ThreadResource;
use App\Http\Events\Thread\Events\CreateEvent;
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

        return $this->user()->can('create', Thread::class);

    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'forum_id' => 'required|numeric|exists:forums,id',
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

        $thread = (new Thread)->createModel($this);

        $response = new ThreadResource($thread);

        event(new CreateEvent($thread, $this->all(), $response));

        return $response;

    }
    
}

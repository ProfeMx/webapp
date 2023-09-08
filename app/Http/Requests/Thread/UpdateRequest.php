<?php

namespace App\Http\Requests\Thread;

use App\Models\Thread;
use App\Http\Resources\Models\ThreadResource;
use App\Http\Events\Thread\Events\UpdateEvent;
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
        
        $thread = Thread::findOrFail($this->thread_id);

        return $this->user()->can('update', $thread);

    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:5000',
            'thread_id' => 'required|numeric'
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

        $thread = Thread::findOrFail($this->thread_id);

        $thread = $thread->updateModel($this);

        $response = new ThreadResource($thread);

        event(new UpdateEvent($thread, $this->all(), $response));

        return $response;

    }

}

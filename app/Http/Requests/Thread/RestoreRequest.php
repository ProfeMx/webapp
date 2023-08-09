<?php

namespace App\Http\Requests\Thread;

use App\Models\Thread;
use App\Http\Resources\Models\ThreadResource;
use App\Http\Events\Thread\Events\RestoreEvent;
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
        
        $thread = Thread::withTrashed()->findOrFail($this->thread_id);
        
        return $this->user()->can('restore', $thread);

    }

    public function rules()
    {
        return [
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

        $thread = Thread::withTrashed()->findOrFail($this->thread_id);

        $thread->restoreModel();

        $response = new ThreadResource($thread);

        event(new RestoreEvent($thread, $this, $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\Thread;

use App\Models\Thread;
use App\Http\Resources\Models\ThreadResource;
use App\Http\Events\Thread\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $thread = Thread::findOrFail($this->thread_id);

        return $this->user()->can('delete', $thread);

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

        $thread = Thread::findOrFail($this->thread_id);

        $thread->deleteModel();

        $response = new ThreadResource($thread);

        event(new DeleteEvent($thread, $this, $response));

        return $response;

    }
    
}

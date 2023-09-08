<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
use App\Http\Resources\Models\NoteResource;
use App\Http\Events\Note\Events\RestoreEvent;
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
        
        $note = Note::withTrashed()->findOrFail($this->note_id);
        
        return $this->user()->can('restore', $note);

    }

    public function rules()
    {
        return [
            'note_id' => 'required|numeric'
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

        $note = Note::withTrashed()->findOrFail($this->note_id);

        $note->restoreModel();

        $response = new NoteResource($note);

        event(new RestoreEvent($note, $this->all(), $response));

        return $response;

    }
    
}

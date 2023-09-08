<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
use App\Http\Resources\Models\NoteResource;
use App\Http\Events\Note\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $note = Note::findOrFail($this->note_id);

        return $this->user()->can('delete', $note);

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

        $note = Note::findOrFail($this->note_id);

        $note->deleteModel();

        $response = new NoteResource($note);

        event(new DeleteEvent($note, $this->all(), $response));

        return $response;

    }
    
}

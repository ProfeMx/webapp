<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
use App\Http\Resources\Models\NoteResource;
use App\Http\Events\Note\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $note = Note::withTrashed()->findOrFail($this->note_id);
        
        return $this->user()->can('forceDelete', $note);

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

        $note->forceDeleteModel();

        $response = new NoteResource($note);

        event(new ForceDeleteEvent($note, $this, $response));

        return $response;

    }
    
}

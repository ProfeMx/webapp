<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
use App\Http\Resources\Models\NoteResource;
use App\Http\Events\Note\Events\UpdateEvent;
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
        
        $note = Note::findOrFail($this->note_id);

        return $this->user()->can('update', $note);

    }

    public function rules()
    {
        return [
            //
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

        $note = $note->updateModel($this);

        $response = new NoteResource($note);

        event(new UpdateEvent($note, $this->all(), $response));

        return $response;

    }

}

<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
use App\Http\Resources\Models\NoteResource;
use App\Http\Events\Note\Events\CreateEvent;
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

        return $this->user()->can('create', Note::class);

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

        $note = (new Note)->createModel($this);

        $response = new NoteResource($note);

        event(new CreateEvent($note, $this->all(), $response));

        return $response;

    }
    
}

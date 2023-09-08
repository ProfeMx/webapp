<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Http\Resources\Models\AttemptResource;
use App\Http\Events\Attempt\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        
        /**
         * Esto nos va a permitir junto con quiz, saber si la inscripción pertenece al curso.
         * Claro que esta lógica la vamos a delegar en el Policy
         **/
        $enrollment = Enrollment::findOrFail($this->enrollment_id);

        $quiz = Quiz::findOrFail($this->quiz_id);

        $this->merge([

            'enrollment' => $enrollment,

            'quiz' => $quiz,

            'quiz_data' => $quiz->toArray(),

        ]);

        request()->merge([

            'enrollment' => $enrollment,

            'quiz' => $quiz,

        ]);

    }

    public function authorize()
    {

        return $this->user()->can('create', Attempt::class);

    }

    public function rules()
    {
        return [
            
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

        $attempt = (new Attempt)->createModel($this);

        $response = new AttemptResource($attempt);

        event(new CreateEvent($attempt, $this->all(), $response));

        return $response;

    }
    
}

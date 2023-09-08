<?php

namespace App\Http\Requests\Answer;

use App\Models\Answer;
use App\Models\Question;
use App\Http\Resources\Models\AnswerResource;
use App\Http\Events\Answer\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        
        /**
         * De "question" debemos recuperar parámetros tales como:
         *  - question_version
         *  - question_data
         *  - weight
         **/
        $question = Question::findOrFail($this->question_id);

        /**
         * También se debe verificar que la pregunta corresponda a un cuestionario 
         * que a su vez pertenezca al intento (attempt) actual
         **/
        $attempt = Attempt::findOrFail($this->attempt_id);

        $this->merge([

            'order' => $order,

            'question_version' => $question->version,

            'question_data' => $question->toArray(), // En un futuro esto mandarlo a otra tabla
            
            'weight' => $question->weight,

        ]);

        /**
         * Este request se va a ocupar en el método "create" de las políticas para crear un "answer"
         **/
        request()->merge([

            'question' => $question,

            'attempt' => $attempt,

        ]);


    }

    public function authorize()
    {

        return $this->user()->can('create', Answer::class);

    }

    public function rules()
    {
        return [
            
            'content' => 'required',
            'order' => 'required|numeric',
            
            'weight' => 'required',
            'question_version' => 'required',
            'question_data' => 'required',
            'question_id' => 'required',

            'attempt_id' => 'required',
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
        /**
         * Acá vamos a tener una clase para calificar la respuesta.
         * Esta clase va a recibir la pregunta y la respuesta y retonrar los parámetros de 
         *  - grade
         *  - feedback
         **/

        /*
        $answerProcessor = new AnswerProcessor($this->question, $this->answer);

        $grade = $answerProcessor->getGrade();

        $feedback = $answerProcessor->getFeedback();

        $this->merge([

            'grade' => $grade,

            'feedback' => $feedback

        ]);
        */

        

    }

    public function handle()
    {

        $answer = (new Answer)->createModel($this);

        $response = new AnswerResource($answer);

        event(new CreateEvent($answer, $this->all(), $response));

        return $response;

    }
    
}

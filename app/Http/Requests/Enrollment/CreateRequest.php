<?php

namespace App\Http\Requests\Enrollment;

use App\Models\Enrollment;
use App\Http\Resources\Models\EnrollmentResource;
use App\Http\Events\Enrollment\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {

        $course = Course::findOrFail($this->course_id);

        $user = User::findOrFail($this->user_id);

        /**
         * En este apartado se debe verificar el tipo de inscripción de acuerdo con la condición
         * o solicitud actual.
         **/
        $type = 'manual';

        /**
         * Las fechas de start_at y end_at se pueden asignar de manera manual o de acuerdo 
         * con la configuración del curso mismo.
         * Esto se debe determinar más adelante. Por ahora start_at va a ser now() y end_at va a ser null, 
         * pero esto solo es provicional.
         **/
        $start_at = now();

        $end_at = null;

        /**
         * En este punto se debe llamar a la clase EnrollmentProcessor para obtener datos como:
         *  - role
         *  - start_at
         *  - end_at
         **/

        $this->merge([

            'course' => $this->course,

            'user' => $this->user,

            'type' => $type,

            'status' => 'active', // Esto tambien se debe calcular de acuerdo con el tipo de inscripción.


        ]);

        request()->merge([

            'course' => $this->course,

            'user' => $this->user,

        ]);

    }

    public function authorize()
    {

        return $this->user()->can('create', Enrollment::class);

    }

    public function rules()
    {
        return [
            'type' => [
                'required',
                Rule::in((new Enrollment)->allowed_types)
            ],
            'status' => [
                'required',
                Rule::in((new Enrollment)->allowed_status)
            ],
            'roles' => [
                'required',
                Rule::in((new Enrollment)->allowed_roles)
            ]
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

        $enrollment = (new Enrollment)->createModel($this);

        $response = new EnrollmentResource($enrollment);

        event(new CreateEvent($enrollment, $this, $response));

        return $response;

    }
    
}

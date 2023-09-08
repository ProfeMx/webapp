<?php

namespace App\Http\Requests\Activity;

use App\Models\Activity;
use App\Http\Resources\Models\ActivityResource;
use App\Http\Events\Activity\Events\CreateEvent;
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

        return $this->user()->can('create', Activity::class);

    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => [
                'required',
                Rule::in(Activity::$allowed_types)
            ],
            'status' => [
                'required',
                Rule::in(Activity::$allowed_status)
            ],
            'weight' => 'required|numeric|max:100|min:0', 
            'lesson_id' => 'required|numeric|exists:lessons,id',
            'activityable_id' => 'nullable|numeric',
            'activityable_type' => [
                'nullable',
                Rule::in(Activity::$allowed_activityables)
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe superar los 255 caracteres.',
            'type.required' => 'El tipo es obligatorio.',
            'type.in' => 'El tipo seleccionado no es válido.',
            'status.required' => 'El estado es obligatorio.',
            'status.in' => 'El estado seleccionado no es válido.',
            'weight.required' => 'El peso es obligatorio.',
            'weight.numeric' => 'El peso debe ser un valor numérico.',
            'lesson_id.required' => 'El ID de la lección es obligatorio.',
            'lesson_id.numeric' => 'El ID de la lección debe ser un valor numérico.',
            'lesson_id.exists' => 'El ID de la lección no existe en la tabla de lecciones.',
            'activityable_id.numeric' => 'El ID de la actividad debe ser un valor numérico.',
            'activityable_type.in' => 'El tipo de actividad seleccionado no es válido.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'type' => 'Tipo',
            'status' => 'Estado',
            'weight' => 'Peso',
            'lesson_id' => 'ID de lección',
            'activityable_id' => 'ID de actividad',
            'activityable_type' => 'Tipo de actividad',
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $activity = (new Activity)->createModel($this);

        $response = new ActivityResource($activity);

        event(new CreateEvent($activity, $this->all(), $response));

        return $response;

    }
    
}

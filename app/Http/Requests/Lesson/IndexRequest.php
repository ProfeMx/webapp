<?php

namespace App\Http\Requests\Lesson;

use App\Models\Lesson;
use App\Http\Resources\Models\LessonResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\SearchSurge\Search\Builder;

class IndexRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        if(auth()->check()) {

            return $this->user()->can('index', Lesson::class);

        } else {

            return true;

        }
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

        $builder = new Builder();

        $query = $builder->get(Lesson::class, $this);

        return LessonResource::collection($query);

    }
}

<?php

namespace App\Http\Requests\Section;

use App\Models\Section;
use App\Http\Resources\Models\SectionResource;
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

            return $this->user()->can('index', Section::class);

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

        $query = $builder->get(Section::class, $this);

        return SectionResource::collection($query);

    }
}

<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use App\Http\Resources\Models\VideoResource;
use App\Http\Events\Video\Events\CreateEvent;
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

        return $this->user()->can('create', Video::class);

    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'source' => [
                'required',
                Rule::in(Video::$allowed_sources)
            ],
            'code' => 'required|string|max:255',
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

        $video = (new Video)->createModel($this);

        $response = new VideoResource($video);

        event(new CreateEvent($video, $this->all(), $response));

        return $response;

    }
    
}

<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use App\Http\Resources\Models\VideoResource;
use App\Http\Events\Video\Events\UpdateEvent;
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
        
        $video = Video::findOrFail($this->video_id);

        return $this->user()->can('update', $video);

    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'video_id' => 'required|numeric'
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

        $video = Video::findOrFail($this->video_id);

        $video = $video->updateModel($this);

        $response = new VideoResource($video);

        event(new UpdateEvent($video, $this, $response));

        return $response;

    }

}

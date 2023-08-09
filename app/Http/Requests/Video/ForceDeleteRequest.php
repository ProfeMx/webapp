<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use App\Http\Resources\Models\VideoResource;
use App\Http\Events\Video\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $video = Video::withTrashed()->findOrFail($this->video_id);
        
        return $this->user()->can('forceDelete', $video);

    }

    public function rules()
    {
        return [
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

        $video = Video::withTrashed()->findOrFail($this->video_id);

        $video->forceDeleteModel();

        $response = new VideoResource($video);

        event(new ForceDeleteEvent($video, $this, $response));

        return $response;

    }
    
}

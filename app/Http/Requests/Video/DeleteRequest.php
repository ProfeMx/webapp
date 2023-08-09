<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use App\Http\Resources\Models\VideoResource;
use App\Http\Events\Video\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $video = Video::findOrFail($this->video_id);

        return $this->user()->can('delete', $video);

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

        $video = Video::findOrFail($this->video_id);

        $video->deleteModel();

        $response = new VideoResource($video);

        event(new DeleteEvent($video, $this, $response));

        return $response;

    }
    
}

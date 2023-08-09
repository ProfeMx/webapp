<?php

namespace App\Http\Controllers;

use App\Http\Requests\Video\PoliciesRequest;
use App\Http\Requests\Video\PolicyRequest;
use App\Http\Requests\Video\IndexRequest;
use App\Http\Requests\Video\ShowRequest;
use App\Http\Requests\Video\CreateRequest;
use App\Http\Requests\Video\UpdateRequest;
use App\Http\Requests\Video\DeleteRequest;
use App\Http\Requests\Video\RestoreRequest;
use App\Http\Requests\Video\ForceDeleteRequest;
use App\Http\Requests\Video\ExportRequest;

class VideoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function policies(PoliciesRequest $request)
    {
        return $request->handle($this);   
    }

    public function policy(PolicyRequest $request)
    {
        return $request->handle();
    }

    public function index(IndexRequest $request)
    {
        return $request->handle();   
    }

    public function show(ShowRequest $request)
    {
        return $request->handle();   
    }

    public function create(CreateRequest $request)
    {
        return $request->handle();   
    }

    public function update(UpdateRequest $request)
    {
        return $request->handle();   
    }

    public function delete(DeleteRequest $request)
    {
        return $request->handle();   
    }

    public function restore(RestoreRequest $request)
    {
        return $request->handle();   
    }

    public function forceDelete(ForceDeleteRequest $request)
    {
        return $request->handle();   
    }

    public function export(ExportRequest $request)
    {
        return $request->handle();   
    }

}

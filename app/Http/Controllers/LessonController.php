<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lesson\PoliciesRequest;
use App\Http\Requests\Lesson\PolicyRequest;
use App\Http\Requests\Lesson\IndexRequest;
use App\Http\Requests\Lesson\ShowRequest;
use App\Http\Requests\Lesson\CreateRequest;
use App\Http\Requests\Lesson\UpdateRequest;
use App\Http\Requests\Lesson\DeleteRequest;
use App\Http\Requests\Lesson\RestoreRequest;
use App\Http\Requests\Lesson\ForceDeleteRequest;
use App\Http\Requests\Lesson\ExportRequest;

class LessonController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
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

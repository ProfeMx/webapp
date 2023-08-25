<?php

namespace App\Http\Controllers;

use App\Http\Requests\Path\PoliciesRequest;
use App\Http\Requests\Path\PolicyRequest;
use App\Http\Requests\Path\IndexRequest;
use App\Http\Requests\Path\ShowRequest;
use App\Http\Requests\Path\CreateRequest;
use App\Http\Requests\Path\UpdateRequest;
use App\Http\Requests\Path\DeleteRequest;
use App\Http\Requests\Path\RestoreRequest;
use App\Http\Requests\Path\ForceDeleteRequest;
use App\Http\Requests\Path\ExportRequest;
use App\Http\Requests\Path\AssignCareerRequest;
use App\Http\Requests\Path\DeallocateCareerRequest;
use App\Http\Requests\Path\AssignCourseRequest;
use App\Http\Requests\Path\DeallocateCourseRequest;

class PathController extends Controller
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

    public function assignCareer(AssignCareerRequest $request)
    {
        return $request->handle();   
    }

    public function deallocateCareer(DeallocateCareerRequest $request)
    {
        return $request->handle();   
    }

    public function assignCourse(AssignCourseRequest $request)
    {
        return $request->handle();   
    }

    public function deallocateCourse(DeallocateCourseRequest $request)
    {
        return $request->handle();   
    }

}

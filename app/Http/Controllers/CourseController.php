<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\PoliciesRequest;
use App\Http\Requests\Course\PolicyRequest;
use App\Http\Requests\Course\IndexRequest;
use App\Http\Requests\Course\ShowRequest;
use App\Http\Requests\Course\CreateRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Http\Requests\Course\DeleteRequest;
use App\Http\Requests\Course\RestoreRequest;
use App\Http\Requests\Course\ForceDeleteRequest;
use App\Http\Requests\Course\ExportRequest;
use App\Http\Requests\Course\AssignPathRequest;
use App\Http\Requests\Course\DeallocatePathRequest;

class CourseController extends Controller
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

    public function assignPath(AssignPathRequest $request)
    {
        return $request->handle();   
    }

    public function deallocatePath(DeallocatePathRequest $request)
    {
        return $request->handle();   
    }

}

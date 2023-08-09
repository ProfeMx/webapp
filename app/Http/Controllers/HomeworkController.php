<?php

namespace App\Http\Controllers;

use App\Http\Requests\Homework\PoliciesRequest;
use App\Http\Requests\Homework\PolicyRequest;
use App\Http\Requests\Homework\IndexRequest;
use App\Http\Requests\Homework\ShowRequest;
use App\Http\Requests\Homework\CreateRequest;
use App\Http\Requests\Homework\UpdateRequest;
use App\Http\Requests\Homework\DeleteRequest;
use App\Http\Requests\Homework\RestoreRequest;
use App\Http\Requests\Homework\ForceDeleteRequest;
use App\Http\Requests\Homework\ExportRequest;

class HomeworkController extends Controller
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Thread\PoliciesRequest;
use App\Http\Requests\Thread\PolicyRequest;
use App\Http\Requests\Thread\IndexRequest;
use App\Http\Requests\Thread\ShowRequest;
use App\Http\Requests\Thread\CreateRequest;
use App\Http\Requests\Thread\UpdateRequest;
use App\Http\Requests\Thread\DeleteRequest;
use App\Http\Requests\Thread\RestoreRequest;
use App\Http\Requests\Thread\ForceDeleteRequest;
use App\Http\Requests\Thread\ExportRequest;

class ThreadController extends Controller
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

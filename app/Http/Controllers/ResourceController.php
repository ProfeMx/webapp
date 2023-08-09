<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resource\PoliciesRequest;
use App\Http\Requests\Resource\PolicyRequest;
use App\Http\Requests\Resource\IndexRequest;
use App\Http\Requests\Resource\ShowRequest;
use App\Http\Requests\Resource\CreateRequest;
use App\Http\Requests\Resource\UpdateRequest;
use App\Http\Requests\Resource\DeleteRequest;
use App\Http\Requests\Resource\RestoreRequest;
use App\Http\Requests\Resource\ForceDeleteRequest;
use App\Http\Requests\Resource\ExportRequest;

class ResourceController extends Controller
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

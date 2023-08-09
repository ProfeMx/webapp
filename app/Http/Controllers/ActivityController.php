<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\PoliciesRequest;
use App\Http\Requests\Activity\PolicyRequest;
use App\Http\Requests\Activity\IndexRequest;
use App\Http\Requests\Activity\ShowRequest;
use App\Http\Requests\Activity\CreateRequest;
use App\Http\Requests\Activity\UpdateRequest;
use App\Http\Requests\Activity\DeleteRequest;
use App\Http\Requests\Activity\RestoreRequest;
use App\Http\Requests\Activity\ForceDeleteRequest;
use App\Http\Requests\Activity\ExportRequest;

class ActivityController extends Controller
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attempt\PoliciesRequest;
use App\Http\Requests\Attempt\PolicyRequest;
use App\Http\Requests\Attempt\IndexRequest;
use App\Http\Requests\Attempt\ShowRequest;
use App\Http\Requests\Attempt\CreateRequest;
use App\Http\Requests\Attempt\UpdateRequest;
use App\Http\Requests\Attempt\DeleteRequest;
use App\Http\Requests\Attempt\RestoreRequest;
use App\Http\Requests\Attempt\ForceDeleteRequest;
use App\Http\Requests\Attempt\ExportRequest;

class AttemptController extends Controller
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

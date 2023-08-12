<?php

namespace App\Http\Controllers;

use App\Http\Requests\Career\PoliciesRequest;
use App\Http\Requests\Career\PolicyRequest;
use App\Http\Requests\Career\IndexRequest;
use App\Http\Requests\Career\ShowRequest;
use App\Http\Requests\Career\CreateRequest;
use App\Http\Requests\Career\UpdateRequest;
use App\Http\Requests\Career\DeleteRequest;
use App\Http\Requests\Career\RestoreRequest;
use App\Http\Requests\Career\ForceDeleteRequest;
use App\Http\Requests\Career\ExportRequest;
use App\Http\Requests\Career\AssignPathRequest;
use App\Http\Requests\Career\DeallocatePathRequest;

class CareerController extends Controller
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

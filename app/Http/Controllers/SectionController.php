<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\PoliciesRequest;
use App\Http\Requests\Section\PolicyRequest;
use App\Http\Requests\Section\IndexRequest;
use App\Http\Requests\Section\ShowRequest;
use App\Http\Requests\Section\CreateRequest;
use App\Http\Requests\Section\UpdateRequest;
use App\Http\Requests\Section\DeleteRequest;
use App\Http\Requests\Section\RestoreRequest;
use App\Http\Requests\Section\ForceDeleteRequest;
use App\Http\Requests\Section\ExportRequest;

class SectionController extends Controller
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

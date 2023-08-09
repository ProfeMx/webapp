<?php

namespace App\Http\Controllers;

use App\Http\Requests\Certificate\PoliciesRequest;
use App\Http\Requests\Certificate\PolicyRequest;
use App\Http\Requests\Certificate\IndexRequest;
use App\Http\Requests\Certificate\ShowRequest;
use App\Http\Requests\Certificate\CreateRequest;
use App\Http\Requests\Certificate\UpdateRequest;
use App\Http\Requests\Certificate\DeleteRequest;
use App\Http\Requests\Certificate\RestoreRequest;
use App\Http\Requests\Certificate\ForceDeleteRequest;
use App\Http\Requests\Certificate\ExportRequest;

class CertificateController extends Controller
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentLog\PoliciesRequest;
use App\Http\Requests\EnrollmentLog\PolicyRequest;
use App\Http\Requests\EnrollmentLog\IndexRequest;
use App\Http\Requests\EnrollmentLog\ShowRequest;
use App\Http\Requests\EnrollmentLog\CreateRequest;
use App\Http\Requests\EnrollmentLog\UpdateRequest;
use App\Http\Requests\EnrollmentLog\DeleteRequest;
use App\Http\Requests\EnrollmentLog\RestoreRequest;
use App\Http\Requests\EnrollmentLog\ForceDeleteRequest;
use App\Http\Requests\EnrollmentLog\ExportRequest;

class EnrollmentLogController extends Controller
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

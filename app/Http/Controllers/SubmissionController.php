<?php

namespace App\Http\Controllers;

use App\Http\Requests\Submission\PoliciesRequest;
use App\Http\Requests\Submission\PolicyRequest;
use App\Http\Requests\Submission\IndexRequest;
use App\Http\Requests\Submission\ShowRequest;
use App\Http\Requests\Submission\CreateRequest;
use App\Http\Requests\Submission\UpdateRequest;
use App\Http\Requests\Submission\DeleteRequest;
use App\Http\Requests\Submission\RestoreRequest;
use App\Http\Requests\Submission\ForceDeleteRequest;
use App\Http\Requests\Submission\ExportRequest;

class SubmissionController extends Controller
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

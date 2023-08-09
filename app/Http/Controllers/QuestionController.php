<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\PoliciesRequest;
use App\Http\Requests\Question\PolicyRequest;
use App\Http\Requests\Question\IndexRequest;
use App\Http\Requests\Question\ShowRequest;
use App\Http\Requests\Question\CreateRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Http\Requests\Question\DeleteRequest;
use App\Http\Requests\Question\RestoreRequest;
use App\Http\Requests\Question\ForceDeleteRequest;
use App\Http\Requests\Question\ExportRequest;

class QuestionController extends Controller
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

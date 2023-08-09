<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\PoliciesRequest;
use App\Http\Requests\Note\PolicyRequest;
use App\Http\Requests\Note\IndexRequest;
use App\Http\Requests\Note\ShowRequest;
use App\Http\Requests\Note\CreateRequest;
use App\Http\Requests\Note\UpdateRequest;
use App\Http\Requests\Note\DeleteRequest;
use App\Http\Requests\Note\RestoreRequest;
use App\Http\Requests\Note\ForceDeleteRequest;
use App\Http\Requests\Note\ExportRequest;

class NoteController extends Controller
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

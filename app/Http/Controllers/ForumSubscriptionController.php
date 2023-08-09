<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForumSubscription\PoliciesRequest;
use App\Http\Requests\ForumSubscription\PolicyRequest;
use App\Http\Requests\ForumSubscription\IndexRequest;
use App\Http\Requests\ForumSubscription\ShowRequest;
use App\Http\Requests\ForumSubscription\CreateRequest;
use App\Http\Requests\ForumSubscription\UpdateRequest;
use App\Http\Requests\ForumSubscription\DeleteRequest;
use App\Http\Requests\ForumSubscription\RestoreRequest;
use App\Http\Requests\ForumSubscription\ForceDeleteRequest;
use App\Http\Requests\ForumSubscription\ExportRequest;

class ForumSubscriptionController extends Controller
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

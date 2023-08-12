<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ThreadFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->thread_id) {

            $query->where('thread_id', $request->thread_id);

        }

        $query = Order::orderBy($query, $request, 'thread_id');

        return $query;

    }

}

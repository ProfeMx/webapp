<?php

namespace App\Models\Filters\Thread;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ForumFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->forum_id) {

            $query->where('forum_id', $request->forum_id);

        }

        $query = Order::orderBy($query, $request, 'forum_id');

        return $query;

    }

}

<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ContentFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->content) {

            $query->where('content', 'like', '%' . $request->content . '%');

        }

        $query = Order::orderBy($query, $request, 'id');

        return $query;

    }

}

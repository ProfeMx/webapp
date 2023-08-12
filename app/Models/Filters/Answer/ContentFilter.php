<?php

namespace App\Models\Filters\Answer;

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

        // $query = Order::orderBy($query, $request, 'content');

        return $query;

    }

}

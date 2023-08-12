<?php

namespace App\Models\Filters\Video;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class SourceFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->source) {

            $query->where('source', $request->source);

        }

        $query = Order::orderBy($query, $request, 'source');

        return $query;

    }

}

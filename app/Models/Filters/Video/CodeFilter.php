<?php

namespace App\Models\Filters\Video;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class CodeFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->code) {

            $query->where('code', $request->code);

        }

        $query = Order::orderBy($query, $request, 'code');

        return $query;

    }

}

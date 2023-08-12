<?php

namespace App\Models\Filters\Resource;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class TypeFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->type) {

            $query->where('type', $request->type);

        }

        $query = Order::orderBy($query, $request, 'type');

        return $query;

    }

}

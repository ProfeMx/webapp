<?php

namespace App\Models\Filters\Path;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class DescriptionFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->description) {

            $query->where('description', 'like', '%' . $request->description . '%');

        }

        $query = Order::orderBy($query, $request, 'description');

        return $query;

    }

}

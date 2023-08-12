<?php

namespace App\Models\Filters\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class NameFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->name) {

            $query->where('name', 'like', '%' . $request->name . '%');

        }

        $query = Order::orderBy($query, $request, 'name');

        return $query;

    }

}

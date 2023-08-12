<?php

namespace App\Models\Filters\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EmailFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->email) {

            $query->where('email', 'like', '%' . $request->email . '%');

        }

        $query = Order::orderBy($query, $request, 'email');

        return $query;

    }

}

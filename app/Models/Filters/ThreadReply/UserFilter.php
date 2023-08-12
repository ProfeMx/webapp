<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class UserFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->user_id) {

            $query->where('user_id', $request->user_id);

        }

        $query = Order::orderBy($query, $request, 'user_id');

        return $query;

    }

}

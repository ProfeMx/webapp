<?php

namespace App\Models\Filters\ForumSubscription;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class StatusFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->status) {

            $query->where('status', $request->status);

        }

        $query = Order::orderBy($query, $request, 'status');

        return $query;

    }

}

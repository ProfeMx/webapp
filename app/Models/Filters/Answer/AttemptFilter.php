<?php

namespace App\Models\Filters\Answer;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class AttemptFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->attempt_id) {

            $query->where('attempt_id', $request->attempt_id);

        }

        $query = Order::orderBy($query, $request, 'attempt_id');

        return $query;

    }

}

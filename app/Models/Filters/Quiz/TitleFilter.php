<?php

namespace App\Models\Filters\Quiz;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class TitleFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->title) {

            $query->where('title', $request->title);

        }

        $query = Order::orderBy($query, $request, 'title');

        return $query;

    }

}

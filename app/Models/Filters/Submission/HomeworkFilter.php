<?php

namespace App\Models\Filters\Submission;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class HomeworkFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->homework_id) {

            $query->where('homework_id', $request->homework_id);

        }

        $query = Order::orderBy($query, $request, 'homework_id');

        return $query;

    }

}

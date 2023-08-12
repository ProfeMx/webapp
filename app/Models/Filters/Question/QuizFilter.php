<?php

namespace App\Models\Filters\Question;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class QuizFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->quiz_id) {

            $query->where('quiz_id', $request->quiz_id);

        }

        $query = Order::orderBy($query, $request, 'quiz_id');

        return $query;

    }

}

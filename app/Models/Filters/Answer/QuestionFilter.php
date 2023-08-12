<?php

namespace App\Models\Filters\Answer;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class QuestionFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->question_id) {

            $query->where('question_id', $request->question_id);

        }

        $query = Order::orderBy($query, $request, 'question_id');

        return $query;

    }

}

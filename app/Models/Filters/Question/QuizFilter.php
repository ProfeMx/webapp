<?php

namespace App\Models\Filters\Question;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class QuizFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->quiz_id) {

            $query->where('quiz_id', $data->quiz_id);

        }

        $query = Order::orderBy($query, $data, 'quiz_id');

        return $query;

    }

}

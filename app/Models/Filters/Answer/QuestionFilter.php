<?php

namespace App\Models\Filters\Answer;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class QuestionFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->question_id) {

            $query->where('question_id', $data->question_id);

        }

        $query = Order::orderBy($query, $data, 'question_id');

        return $query;

    }

}

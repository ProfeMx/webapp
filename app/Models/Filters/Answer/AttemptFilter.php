<?php

namespace App\Models\Filters\Answer;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class AttemptFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->attempt_id) {

            $query->where('attempt_id', $data->attempt_id);

        }

        $query = Order::orderBy($query, $data, 'attempt_id');

        return $query;

    }

}

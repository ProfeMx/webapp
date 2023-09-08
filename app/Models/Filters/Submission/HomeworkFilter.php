<?php

namespace App\Models\Filters\Submission;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class HomeworkFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->homework_id) {

            $query->where('homework_id', $data->homework_id);

        }

        $query = Order::orderBy($query, $data, 'homework_id');

        return $query;

    }

}

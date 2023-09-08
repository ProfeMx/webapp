<?php

namespace App\Models\Filters\EnrollmentLog;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class LessonFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->lesson_id) {

            $query->where('lesson_id', $data->lesson_id);

        }

        $query = Order::orderBy($query, $data, 'lesson_id');

        return $query;

    }

}

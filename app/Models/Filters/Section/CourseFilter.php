<?php

namespace App\Models\Filters\Section;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class CourseFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->course_id) {

            $query->where('course_id', $data->course_id);

        }

        $query = Order::orderBy($query, $data, 'course_id');

        return $query;

    }

}

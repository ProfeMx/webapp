<?php

namespace App\Models\Filters\Section;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class CourseFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->course_id) {

            $query->where('course_id', $request->course_id);

        }

        $query = Order::orderBy($query, $request, 'course_id');

        return $query;

    }

}

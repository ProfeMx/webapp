<?php

namespace App\Models\Filters\EnrollmentLog;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class LessonFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->lesson_id) {

            $query->where('lesson_id', $request->lesson_id);

        }

        $query = Order::orderBy($query, $request, 'lesson_id');

        return $query;

    }

}

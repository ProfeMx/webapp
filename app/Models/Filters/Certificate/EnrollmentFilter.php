<?php

namespace App\Models\Filters\Certificate;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EnrollmentFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->enrollment_id) {

            $query->where('enrollment_id', $request->enrollment_id);

        }

        $query = Order::orderBy($query, $request, 'enrollment_id');

        return $query;

    }

}

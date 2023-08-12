<?php

namespace App\Models\Filters\Activity;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ActivityableFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->activityable_id) {

            $query->where('activityable_id', $request->activityable_id);

        }

        if ($request->activityable_type) {

            $query->where('activityable_type', $request->activityable_type);

        }

        $query = Order::orderBy($query, $request, 'activityable_id');

        $query = Order::orderBy($query, $request, 'activityable_type');

        return $query;

    }

}

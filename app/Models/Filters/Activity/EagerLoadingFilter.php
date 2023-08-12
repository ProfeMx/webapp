<?php

namespace App\Models\Filters\Activity;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_lesson == 1 || $request->load_lesson == true) {

            $query->with(['lesson']);

        }

        if ($request->load_activityable == 1 || $request->load_activityable == true) {

            $query->with(['activityable']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

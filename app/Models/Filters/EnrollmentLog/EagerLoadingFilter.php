<?php

namespace App\Models\Filters\EnrollmentLog;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_enrollment == 1 || $request->load_enrollment == true) {

            $query->with(['enrollment']);

        }

        if ($request->load_lesson == 1 || $request->load_lesson == true) {

            $query->with(['lesson']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

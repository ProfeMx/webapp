<?php

namespace App\Models\Filters\Lesson;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_metas == 1 || $request->load_metas == true) {

            $query->with(['metas']);

        }

        if ($request->load_activities == 1 || $request->load_activities == true) {

            $query->with(['activities']);

        }

        if ($request->load_resources == 1 || $request->load_resources == true) {

            $query->with(['resources']);

        }

        if ($request->load_enrollment_logs == 1 || $request->load_enrollment_logs == true) {

            $query->with(['enrollmentLogs']);

        }

        if ($request->load_sections == 1 || $request->load_sections == true) {

            $query->with(['sections']);

        }

        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

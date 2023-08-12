<?php

namespace App\Models\Filters\Enrollment;

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

        if ($request->load_course == 1 || $request->load_course == true) {

            $query->with(['course']);

        }

        if ($request->load_enrollment_logs == 1 || $request->load_enrollment_logs == true) {

            $query->with(['enrollmentLogs']);

        }

        if ($request->load_user == 1 || $request->load_user == true) {

            $query->with(['user']);

        }

        if ($request->load_certificate == 1 || $request->load_certificate == true) {

            $query->with(['certificate']);

        }
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

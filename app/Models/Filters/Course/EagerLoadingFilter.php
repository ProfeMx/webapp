<?php

namespace App\Models\Filters\Course;

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

        if ($request->load_paths == 1 || $request->load_paths == true) {

            $query->with(['paths']);

        }

        if ($request->load_enrollments == 1 || $request->load_enrollments == true) {

            $query->with(['enrollments']);

        }

        if ($request->load_sections == 1 || $request->load_sections == true) {

            $query->with(['sections']);

        }

        if ($request->load_forums == 1 || $request->load_forums == true) {

            $query->with(['forums']);

        }
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

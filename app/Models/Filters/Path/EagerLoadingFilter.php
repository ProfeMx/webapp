<?php

namespace App\Models\Filters\Path;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_courses == 1 || $request->load_courses == true) {

            $query->with(['courses']);

        }

        if ($request->load_paths == 1 || $request->load_paths == true) {

            $query->with(['paths']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

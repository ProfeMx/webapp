<?php

namespace App\Models\Filters\Section;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_lessons == 1 || $request->load_lessons == true) {

            $query->with(['lessons']);

        }

        if ($request->load_course == 1 || $request->load_course == true) {

            $query->with(['course']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

<?php

namespace App\Models\Filters\Homework;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_activity == 1 || $request->load_activity == true) {

            $query->with(['activity']);

        }

        if ($request->load_submissions == 1 || $request->load_submissions == true) {

            $query->with(['submissions']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

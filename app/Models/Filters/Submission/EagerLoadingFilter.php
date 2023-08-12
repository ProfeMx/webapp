<?php

namespace App\Models\Filters\Submission;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {
        
        if ($request->load_user == 1 || $request->load_user == true) {

            $query->with(['user']);

        }

        if ($request->load_homework == 1 || $request->load_homework == true) {

            $query->with(['homework']);

        }

        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

<?php

namespace App\Models\Filters\Answer;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_attempt == 1 || $request->load_attempt == true) {

            $query->with(['attempt']);

        }

        if ($request->load_question == 1 || $request->load_question == true) {

            $query->with(['question']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

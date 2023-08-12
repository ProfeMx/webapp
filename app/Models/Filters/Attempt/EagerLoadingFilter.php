<?php

namespace App\Models\Filters\Attempt;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_quiz == 1 || $request->load_quiz == true) {

            $query->with(['quiz']);

        }

        if ($request->load_answers == 1 || $request->load_answers == true) {

            $query->with(['answers']);

        }

        if ($request->load_user == 1 || $request->load_user == true) {

            $query->with(['user']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

<?php

namespace App\Models\Filters\Quiz;

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

        if ($request->load_activity == 1 || $request->load_activity == true) {

            $query->with(['activity']);

        }

        if ($request->load_questions == 1 || $request->load_questions == true) {

            $query->with(['questions']);

        }

        if ($request->load_attempts == 1 || $request->load_attempts == true) {

            $query->with(['attempts']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

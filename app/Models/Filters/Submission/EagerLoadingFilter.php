<?php

namespace App\Models\Filters\Submission;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {
        
        if ($data->load_user == 1 || $data->load_user == true) {

            $query->with(['user']);

        }

        if ($data->load_homework == 1 || $data->load_homework == true) {

            $query->with(['homework']);

        }

        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

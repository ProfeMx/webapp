<?php

namespace App\Models\Filters\Answer;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_attempt == 1 || $data->load_attempt == true) {

            $query->with(['attempt']);

        }

        if ($data->load_question == 1 || $data->load_question == true) {

            $query->with(['question']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

<?php

namespace App\Models\Filters\Quiz;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_metas == 1 || $data->load_metas == true) {

            $query->with(['metas']);

        }

        if ($data->load_activity == 1 || $data->load_activity == true) {

            $query->with(['activity']);

        }

        if ($data->load_questions == 1 || $data->load_questions == true) {

            $query->with(['questions']);

        }

        if ($data->load_attempts == 1 || $data->load_attempts == true) {

            $query->with(['attempts']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

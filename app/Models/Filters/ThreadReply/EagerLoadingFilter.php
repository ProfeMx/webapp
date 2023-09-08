<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_thread == 1 || $data->load_thread == true) {

            $query->with(['thread']);

        }

        if ($data->load_user == 1 || $data->load_user == true) {

            $query->with(['user']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}

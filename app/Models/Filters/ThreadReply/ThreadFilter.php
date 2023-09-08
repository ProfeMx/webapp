<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ThreadFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->thread_id) {

            $query->where('thread_id', $data->thread_id);

        }

        $query = Order::orderBy($query, $data, 'thread_id');

        return $query;

    }

}

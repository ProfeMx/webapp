<?php

namespace App\Models\Filters\Video;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class SourceFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->source) {

            $query->where('source', $data->source);

        }

        $query = Order::orderBy($query, $data, 'source');

        return $query;

    }

}

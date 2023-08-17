<?php

namespace App\Exports;

use App\Models\ThreadReply;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ThreadRepliesExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view(
            config(
                'app.excel_view', 
                'app::excel.'
            ) . 'thread_reply', 
            [
                'thread_replies' => $this->getQuery(),
                'exportCols' => ThreadReply::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(ThreadReply::class, $this->request);

    }

}
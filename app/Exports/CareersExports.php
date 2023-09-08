<?php

namespace App\Exports;

use App\Models\Career;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CareersExports implements FromView
{

    protected $data;

    public function __construct(array $data) 
    {

        $this->data = $data;

    }

    public function view(): View
    {
        return view(
            config(
                'app.excel_view', 
                'app::excel.'
            ) . 'career', 
            [
                'careers' => $this->getQuery(),
                'exportCols' => Career::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Career::class, $this->data);

    }

}
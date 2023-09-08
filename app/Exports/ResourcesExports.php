<?php

namespace App\Exports;

use App\Models\Resource;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResourcesExports implements FromView
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
            ) . 'resource', 
            [
                'resources' => $this->getQuery(),
                'exportCols' => Resource::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Resource::class, $this->data);

    }

}
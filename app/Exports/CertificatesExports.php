<?php

namespace App\Exports;

use App\Models\Certificate;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CertificatesExports implements FromView
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
            ) . 'certificate', 
            [
                'certificates' => $this->getQuery(),
                'exportCols' => Certificate::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Certificate::class, $this->data);

    }

}
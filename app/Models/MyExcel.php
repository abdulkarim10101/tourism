<?php

namespace App\Exports;

use \Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class MyExport implements FromCollection
{
    private $data;

    function __construct($data) {
        $this->data = $data;
    }

    public function collection()
    {
        return new Collection($this->data);
    }
}

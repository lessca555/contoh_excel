<?php

namespace App\Imports;

use App\Models\ExcelImport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Sales implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExcelImport([
            'name' => $row['name'],
            'umur' => $row['umur'],
        ]);
    }
}

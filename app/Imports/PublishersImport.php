<?php

namespace App\Imports;

use App\Publisher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

HeadingRowFormatter::default('none');

class PublishersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Publisher([
           'name'       => $row['Name'],
           'email'      => $row['Email'],
           'address'    => $row['Address'],
           'contact'    => $row['Contact'],
           'created_at' => now(),
        ]);
    }
}

<?php

namespace App\Imports;

use App\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Illuminate\Support\Facades\Auth;

HeadingRowFormatter::default('none');

class BooksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
           'title'          => $row['Title'],
           'author'         => $row['Author'],
           'category'       => $row['Category'],
           'publisher_id'   => $row['Publisher'],
           'hal'            => $row['hal'],
           'user_id'        => Auth::id(),
           'created_at'     => now(),
        ]);
    }
}
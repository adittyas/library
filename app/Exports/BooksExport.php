<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;


class BooksExport implements  FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }
    public function headings(): array

    {
        return [
            'Title',
            'Author',
            'hal',
            'Category',
            'Publisher',
        ];

    }
     public function map($map): array
    {
        return [
            [
                $map->title,
                $map->author,
                $map->hal,
                $map->category,
                $map->publisher_id,
            ]
        ];
    }
}
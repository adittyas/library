<?php

namespace App\Exports;

use App\Publisher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class PublishersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Publisher::all();
    }

     public function headings(): array

    {
        return [
            'Name',
            'Email',
            'Address',
            'Contact',
        ];

    }
     public function map($map): array
    {
        return [
            [
                $map->name,
                $map->email,
                $map->address,
                $map->contact,
            ]
        ];
    }
}
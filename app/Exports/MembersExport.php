<?php

namespace App\Exports;

use App\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class MembersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
    }

     public function headings(): array

    {
        return [
            'Name',
            'NIM',
            'Email',
            'Contact',
        ];

    }
     public function map($map): array
    {
        return [
            [
                $map->name,
                $map->nim,
                $map->email,
                $map->contact,
            ]
        ];
    }
}

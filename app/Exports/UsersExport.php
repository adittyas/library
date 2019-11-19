<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    // public function startCell(): string
    // {
    //     return 'A1';
    // // }
        public function headings(): array

    {
        return [
            'ID Employee',
            'First Name',
            'Last Name',
            'Email',
        ];

    }
     public function map($map): array
    {
        return [
            [
                $map->id_employee,
                $map->first_name,
                $map->last_name,
                $map->email,
            ]
        ];
    }
}

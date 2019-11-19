<?php

namespace App\Imports;

use App\User;
use App\Profile;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

HeadingRowFormatter::default('none');

class UsersImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $user = User::create([
           'id_employee'   => $row['ID Employee'],
           'first_name'    => $row['First Name'],
           'last_name'     => $row['Last Name'],
           'email'         => $row['Email'],
           'password'      => Hash::make($row['Last Name'].$row['ID Employee']),
           'created_at'    => now(),
        ]);
        Profile::create([
            'user_id'      => $user->id,
            'address'      => 'Kp sawah',
            'province'     => 'Jawa Barat',
            'district'     => 'Kota Bekasi',
            'sub_district' => 'Pondokmelati',
            'urban_village'=> 'Jatimelati',
            'postal_code'  => '1111',
            'contact'      => '11111111111',
        ]);
        return $user;
    }
}
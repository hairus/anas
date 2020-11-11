<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new User([
            'name'          => $row['name'],
            'email'         => $row['email'],
            'keterangan'    => $row['keterangan'],
            'password'      => Hash::make($row['password'])
        ]);
    }
}

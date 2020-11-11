<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromQuery, WithHeadings
{
    use Exportable;


    public function query()
    {
        return User::query()->where('keterangan', 'siswa');
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Email_verifikasi',
            'keterangan',
            'password',
        ];
    }
}

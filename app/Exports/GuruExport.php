<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromQuery, WithHeadings
{
    use Exportable;


    public function query()
    {
        return User::query()->where('keterangan', 'guru');
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

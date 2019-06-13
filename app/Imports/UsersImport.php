<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make('12345678'),
            'nis' => $row['nis'],
            'nip' => $row['nip'],
            'gender' => $row['gender'],
            'agency' => $row['agency'],
            'grade' => $row['grade'],
            'phone' => $row['phone'],
            'file' => $row['file'],
            'school_id' => $row['school_id']
        ]);
    }
}

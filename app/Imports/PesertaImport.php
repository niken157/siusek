<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class PesertaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peserta([
            'nis'     => $row['nis'],
            'nama_peserta'    => $row['nama_peserta'],
            'kelas'     => $row['kelas'],
            'jenis_kelamin'    => $row['jenis_kelamin'],
            'agama'     => $row['agama'],
            'created_at'    => $row['created_at'],
            'updated_at'     => $row['updated_at'],
            // 'password' => Hash::make($row['password']),
        ]);
    }
}

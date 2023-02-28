<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peserta')->insert([
            'nis' => '782637',
            'nama_peserta' => 'Nadia Omara',
            'ttl' => 'Blitar, 5 oktober 2005',
            'kelas_jurusan' => 'Rekayasa Perangkat Lunak',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
    }
}

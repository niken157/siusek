<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruangan')->insert([
            'nomor_ruangan' => 'ruangan 1',
            'nama_ruangan' => 'lab tkj B',
            'jumlah_pc' => 'pc 24',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
    }
}

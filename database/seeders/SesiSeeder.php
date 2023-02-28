<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sesi')->insert([
            'id_sesi' =>'',
            'id_ujian' =>'001',
            'no_sesi' =>'01',
            'jam_sesi' =>'07.00',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
    }
}

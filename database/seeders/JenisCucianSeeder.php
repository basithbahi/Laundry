<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisCucianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_cucian')->insert([
            ['id_jenis_cucian' => 'JC03', 'jenis_cucian' => 'Pakaian', 'harga' => 5000],
            ['id_jenis_cucian' => 'JC04', 'jenis_cucian' => 'Boneka', 'harga' => 6500],
            ['id_jenis_cucian' => 'JC05', 'jenis_cucian' => 'Songkok', 'harga' => 7000],
            ['id_jenis_cucian' => 'JC06', 'jenis_cucian' => 'Sarung', 'harga' => 4500],
        ]);
    }
}
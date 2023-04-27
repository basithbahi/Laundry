<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPencuciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_pencuci')->insert([
            ['id_jenis_pencuci' => 'JP03', 'jenis_pencuci' => 'Pewangi', 'harga' => 6000],
            ['id_jenis_pencuci' => 'JP04', 'jenis_pencuci' => 'Pemutih', 'harga' => 4500],
            ['id_jenis_pencuci' => 'JP05', 'jenis_pencuci' => 'Deterjen + Pemutih', 'harga' => 9000],
            ['id_jenis_pencuci' => 'JP06', 'jenis_pencuci' => 'Pewangi + Pemutih', 'harga' => 9500],
        ]);
    }
}

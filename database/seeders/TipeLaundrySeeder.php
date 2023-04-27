<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipe_laundry')->insert([
            ['id_tipe_laundry' => 'TL04', 'tipe_laundry' => 'Bed Cover', 'harga' => 9000],
            ['id_tipe_laundry' => 'TL05', 'tipe_laundry' => 'Karpet', 'harga' => 15000],
            ['id_tipe_laundry' => 'TL06', 'tipe_laundry' => 'Express', 'harga' => 21000],
            ['id_tipe_laundry' => 'TL07', 'tipe_laundry' => 'Dry Clean', 'harga' => 20500],
        ]);
    }
}

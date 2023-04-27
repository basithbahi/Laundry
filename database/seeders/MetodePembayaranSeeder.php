<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metode_pembayaran')->insert([
            ['id_metode_pembayaran' => 'MP02', 'metode_pembayaran' => 'Debit'],
            ['id_metode_pembayaran' => 'MP03', 'metode_pembayaran' => 'COD'],
            ['id_metode_pembayaran' => 'MP04', 'metode_pembayaran' => 'Mitra Laundry'],
        ]);
    }
}

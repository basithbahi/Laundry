<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi')->nullable();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_jenis_cucian')->references('id')->on('jenis_cucian');
            $table->foreignId('id_tipe_laundry')->references('id')->on('tipe_laundry');
            $table->foreignId('id_jenis_pencuci')->references('id')->on('jenis_pencuci');
            $table->double('berat_cucian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};

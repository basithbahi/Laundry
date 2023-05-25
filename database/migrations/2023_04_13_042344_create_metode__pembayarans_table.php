<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_metode_pembayaran');
            $table->string('metode_pembayaran');
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('metode_pembayaran_transaksi');
            $table->foreignId('invoice')->references('id')->on('metode_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metode_pembayaran');
    }
};

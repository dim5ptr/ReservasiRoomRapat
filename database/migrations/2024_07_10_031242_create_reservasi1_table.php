<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasi1Table extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasi1', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('phone');
            $table->date('date')->unique(); // Tambahkan unique constraint
            $table->string('ruang');
            $table->string('tambahan_fasilitas');
            $table->integer('jumlah');
            $table->string('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi1');
    }
}

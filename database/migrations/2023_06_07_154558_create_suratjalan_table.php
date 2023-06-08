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
        Schema::create('suratjalan', function (Blueprint $table) {
            $table->id('id_suratjalan');

            $table->foreignId('id_pegawai')->constrained('pegawai','id_pegawai');

            $table->char('no_suratjalan',10);
            $table->string('nama_penerima_suratjalan',50);
            $table->string('notelp_penerima_suratjalan',15);
            $table->date('waktu_penerimaan_suratjalan');
            $table->string('tipe_kendaraan_suratjalan',30);
            $table->string('noplat_suratjalan',10);
            $table->boolean('status_suratjalan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratjalan');
    }
};

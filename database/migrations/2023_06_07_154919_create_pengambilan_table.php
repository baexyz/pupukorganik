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
        Schema::create('pengambilan', function (Blueprint $table) {
            $table->id('id_pengambilan');
            $table->string('id_pemesanan');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pembayaran');
            $table->boolean('status_pengambilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengambilan');
    }
};

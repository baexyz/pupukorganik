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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('id_pemesanan');
            $table->foreign('id_pemesanan')->references('id_keranjang')->on('keranjang');
            $table->timestamp('waktu_pembayaran')->nullable();
            $table->enum('status_pembayaran', ['PENDING', 'PAID', 'EXPIRED']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

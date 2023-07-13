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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->string('id_keranjang', 7);
            $table->primary('id_keranjang');
            $table->foreignId('id_user')->constrained('user','id_user');
            $table->json('produk');
            $table->integer('harga_total_keranjang');
            $table->boolean('isCheckout')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};

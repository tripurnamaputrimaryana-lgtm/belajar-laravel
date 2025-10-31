<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
        $table->foreignId('produk_id')->constrained('produk_stoks')->onDelete('cascade');
        $table->integer('jumlah');
        $table->decimal('subtotal', 15, 2);
        $table->timestamps();
    });

    }
    
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};

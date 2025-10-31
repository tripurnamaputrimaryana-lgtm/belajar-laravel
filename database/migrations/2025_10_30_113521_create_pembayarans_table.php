<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
        $table->string('metode', 50);
        $table->decimal('jumlah_bayar', 15, 2);
        $table->decimal('kembalian', 15, 2);
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
        $table->id(); 
        $table->string('nama', 100);
        $table->text('alamat');
        $table->string('no_hp', 20);
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};

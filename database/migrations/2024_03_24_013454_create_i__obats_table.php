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
        Schema::create('i__obats', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('nama_obat');
            $table->string('kode_obat');
            $table->string('kandungan');
            $table->string('jumlah_obat');
            $table->string('harga_obat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i__obats');
    }
};

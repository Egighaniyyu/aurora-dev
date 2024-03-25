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
        Schema::create('m__pasiens', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('no_rm');
            $table->string('no_bpjs')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->string('jenis_kelamin');
            $table->string('status_hubungan');
            $table->string('nama_orangtua');
            $table->string('no_telepon');
            $table->date('tanggal_lahir');
            $table->text('alamat')->nullable();
            $table->string('agama');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->integer('rt')->length(2);
            $table->integer('rw')->length(2);
            $table->datetime('tanggal_pendaftaran');
            $table->integer('jenis_layanan'); // 1. Umum, 2. BPJS
            $table->string('status'); // 1. aktif, 2. tidak aktif
            $table->string('alasan_tidak_aktif')->nullable(); // 1. meninggal, 2. pindah, 3. lainnya
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m__pasiens');
    }
};

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
        Schema::create('r_p__patient_examinations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('no_rm'); // refrerence from pasienMaster table
            $table->string('no_registrasi')->unique();
            $table->string('alergi_makanan')->nullable();
            $table->string('alergi_udara')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->string('nama_penanggung_jawab');
            $table->string('hubungan')->nullable();
            $table->text('catatan')->nullable();
            $table->string('nik_penanggung_jawab')->nullable();
            $table->string('no_telepon_penanggung_jawab')->nullable();
            $table->string('pekerjaan_penanggung_jawab')->nullable();
            $table->integer('status');
            $table->datetime('tanggal_pendaftaran');
            $table->integer('jenis_kunjungan');
            $table->integer('jenis_layanan'); // 1. Umum, 2. BPJS
            $table->integer('poli_tujuan');
            $table->integer('berat_badan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->float('suhu_badan')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->float('sistole')->nullable();
            $table->float('diastole')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_p__patient_examinations');
    }
};

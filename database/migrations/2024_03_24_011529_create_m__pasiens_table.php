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
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_menikah');
            $table->string('nama_orangtua');
            $table->string('no_telepon');
            $table->string('agama');
            $table->string('gol_darah');
            $table->integer('provinsi');
            $table->integer('kabupaten');
            $table->integer('kecamatan');
            $table->integer('kelurahan');
            $table->text('alamat_ktp');
            $table->text('alamat_domisili')->nullable();
            $table->string('alergi_makanan');
            $table->string('alergi_udara');
            $table->string('alergi_obat');
            $table->string('hubungan_penanggung_jawab');
            $table->string('nik_penanggung_jawab');
            $table->string('nama_penanggung_jawab');
            $table->string('no_telepon_penanggung_jawab');
            $table->string('alamat_penanggung_jawab');
            $table->string('pekerjaan_penanggung_jawab');
            $table->datetime('tanggal_pendaftaran');
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

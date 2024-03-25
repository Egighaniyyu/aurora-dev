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
        Schema::create('m__mains', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rs')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo_rs')->nullable();
            $table->string('footer_text')->nullable();
            $table->text('kebijakan_privasi')->nullable();
            $table->text('tentang_kami')->nullable();
            $table->text('syarat_dan_ketentuan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m__mains');
    }
};

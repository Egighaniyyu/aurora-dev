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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('role');
            $table->boolean('get')->default(0);
            $table->boolean('post')->default(0);
            $table->boolean('put')->default(0);
            $table->boolean('delete')->default(0);
            $table->boolean('restore')->default(0);
            $table->boolean('force-delete')->default(0);
            $table->boolean('trash')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};

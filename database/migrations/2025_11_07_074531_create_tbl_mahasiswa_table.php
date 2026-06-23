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
        Schema::create('tbl_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(false);
            $table->string('nim')->unique()->nullable(false);
            $table->string('program_studi')->nullable(false);
            $table->string('angkatan')->nullable(); // opsional
            $table->string('email')->nullable();    // opsional
            $table->string('no_hp')->nullable();    // opsional
            $table->string('foto')->nullable(); // simpan path foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mahasiswa');
    }
};

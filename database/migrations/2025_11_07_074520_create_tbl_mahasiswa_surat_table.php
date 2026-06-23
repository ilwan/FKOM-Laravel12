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
        Schema::create('tbl_mahasiswa_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->constrained('tbl_surat')->onDelete('cascade');
            $table->string('nama_mahasiswa');
            $table->string('nim')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('judul_penelitian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mahasiswa_surat');
    }
};

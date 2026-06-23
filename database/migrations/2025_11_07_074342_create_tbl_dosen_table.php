<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nidn')->unique();
            $table->string('nama');
            $table->string('prodi');
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('jabatan');
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('bidang_keahlian')->nullable();
            $table->string('google_id')->nullable();
            $table->string('sinta_link')->nullable();
            $table->string('scopus_link')->nullable();
            $table->string('foto_url')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_dosen');
    }
};

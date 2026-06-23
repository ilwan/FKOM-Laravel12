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
        Schema::create('tbl_surat', function (Blueprint $table) {
           $table->id();
            $table->foreignId('kategori_surat_id')->constrained('tbl_kategori_surat')->onDelete('cascade');
            $table->foreignId('pengirim_id')->nullable()->constrained('tbl_pengirim_surat')->onDelete('set null');
            $table->foreignId('penerima_id')->nullable()->constrained('tbl_penerima_surat')->onDelete('set null');
            $table->unsignedSmallInteger('leading_number')->nullable();
            $table->unsignedInteger('nomor_urut');
            $table->date('tanggal');
            $table->string('nomor_surat')->unique();
            $table->string('perihal');
            $table->string('file_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_surat');
    }
};

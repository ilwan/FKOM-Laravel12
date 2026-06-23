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
        Schema::create('tbl_penerima_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima'); // contoh: Bapak Yodi, S.Kom., M.S.I.
            $table->string('jabatan_penerima')->nullable(); // contoh: Wakil Rektor Akademik dan Kemahasiswaan
            $table->string('instansi')->nullable(); // contoh: Universitas Universal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_penerima_surat');
    }
};

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
        Schema::create('tbl_pengirim_surat', function (Blueprint $table) {
           $table->id();
            $table->string('nama_pengirim'); // contoh: Fakultas Komputer
            $table->string('jabatan_pengirim')->nullable(); // contoh: Dekan Fakultas Komputer
            $table->string('penandatangan')->nullable(); // contoh: Suryo Widiantoro, S.T., M.MSI., M.Com.(IS)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengirim_surat');
    }
};

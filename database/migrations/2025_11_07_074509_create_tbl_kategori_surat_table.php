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
        Schema::create('tbl_kategori_surat', function (Blueprint $table) {
           $table->id();
             $table->string('jenis_surat');
            $table->string('kode')->nullable(); // e.g. '01', '02'
            $table->unsignedInteger('start_number')->default(1);
            $table->unsignedInteger('latest_number')->nullable();
            $table->unsignedInteger('latest_year')->nullable(); // untuk reset tahunan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kategori_surat');
    }
};

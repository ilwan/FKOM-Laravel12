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
        Schema::create('tbl_notulen_foto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notulen_id')->constrained('tbl_notulen_rapat')->onDelete('cascade');
            $table->string('foto_path');  
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_notulen_foto');
    }
};

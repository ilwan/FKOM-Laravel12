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
        Schema::create('tbl_kurikulum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id')->constrained('tbl_prodi')->onDelete('cascade'); //relasi
            $table->integer('semester');
            $table->string('course_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kurikulum');
    }
};

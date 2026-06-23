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
        Schema::create('tbl_slide', function (Blueprint $table) {
            $table->id();
            $table->string('image_path', 255); // menyimpan path gambar
            $table->string('alt_text', 255);   // alt text untuk aksesibilitas SEO
            $table->string('title', 255);      // judul slide
            $table->text('description')->nullable(); // deskripsi opsional
            $table->boolean('is_active')->default(true); // status aktif / tidak
            $table->integer('display_order')->default(0); // urutan tampil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_slide');
    }
};

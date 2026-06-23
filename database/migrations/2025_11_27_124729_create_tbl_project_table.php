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
        Schema::create('tbl_project', function (Blueprint $table) {
             $table->id();
            $table->string('title');
            $table->string('student');
            $table->string('nim', 20);
            $table->string('prodi');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            // Image utama
            $table->string('image')->nullable();
            // Gallery (format JSON)
            $table->json('gallery')->nullable();
            // Tags (format JSON)
            $table->json('tags')->nullable();
            // Link GitHub / Repo
            $table->string('link')->nullable();
            // Link Demo Aplikasi
            $table->string('demo')->nullable();
            $table->string('year', 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_project');
    }
};

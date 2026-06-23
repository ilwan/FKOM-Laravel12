<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\NotulenRapatController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratPublicController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProjectController;



Route::get('/clear', function () {
    // Bersihkan semua cache
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "✅ Laravel cache, config, route, dan view sudah dibersihkan!";
});
Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return "✅ Storage linked!";
});

Route::get('/pengajuan-surat', [SuratPublicController::class, 'create'])->name('surat.public.create');
Route::post('/pengajuan-surat', [SuratPublicController::class, 'store'])->name('surat.public.store');
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'getByNim']);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/e-surat', function () {
    return view('e-surat');
})->name('e-surat');


Route::get('/dashboard', function () {
     return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('notulen', NotulenRapatController::class);
    Route::get('/notulen/{id}/print', [NotulenRapatController::class, 'print'])->name('notulen.print');
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);
    Route::resource('surat', SuratController::class);
    Route::get('surat/{surat}/verifikasi', [SuratController::class, 'verifikasi'])->name('surat.verifikasi');
    Route::post('surat/{surat}/verifikasi', [SuratController::class, 'verifikasi'])->name('surat.verifikasi');
    Route::post('surat/{surat}/setuju', [SuratController::class, 'setuju'])->name('surat.setuju');
    Route::post('surat/{surat}/tolak', [SuratController::class, 'tolak'])->name('surat.tolak');
    Route::get('surat/{surat}/cetak', [SuratController::class, 'cetakPDF'])->name('surat.cetak');
    Route::resource('project', ProjectController::class);
//#y4^XH;wBzESbVu-
});
require __DIR__.'/auth.php';
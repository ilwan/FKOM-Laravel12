<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BeritaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DosenController;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\ProdiController;

Route::get('/dosen/prodi/{prodi}', [DosenController::class, 'dosenprodi']);
Route::apiResource('dosen', DosenController::class)->names('api.dosen');
Route::apiResource('berita', BeritaController::class)->names('api.berita');
Route::apiResource('slide', SlideController::class)->names('api.slide');
Route::get('/prodi/{nama}', [ProdiController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

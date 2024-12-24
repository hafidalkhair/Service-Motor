<?php

use App\Http\Controllers\Api\DaftarServiceController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('pelanggan', PelangganController::class);
Route::apiResource('kendaraan', KendaraanController::class);
Route::apiResource('daftar-service', DaftarServiceController::class);
Route::apiResource('data-service', ServiceController::class);
Route::apiResource('pembayaran', PembayaranController::class);
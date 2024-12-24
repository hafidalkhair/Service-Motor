<?php

use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('daftar-service', DaftarServiceController::class);
Route::resource('service', ServiceController::class);
Route::resource('pembayaran', PembayaranController::class);

Route::get('/getKeluhan/{id}', [ServiceController::class, 'getKeluhan']);

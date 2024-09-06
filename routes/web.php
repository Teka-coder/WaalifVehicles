<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [VehicleController::class, 'index'])->name('home');
Route::resource('vehicles', VehicleController::class);

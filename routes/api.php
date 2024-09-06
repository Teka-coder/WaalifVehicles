<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\RoleMiddleware;

Route::middleware('auth:sanctum')->group(function () {
    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::post('/vehicles', [VehicleController::class, 'store']);
        Route::put('/vehicles/{id}', [VehicleController::class, 'update']);
        Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy']);
    });

    // Driver routes
    Route::middleware('role:driver')->group(function () {
        Route::get('/vehicles', [VehicleController::class, 'index']);
        Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
    });
});





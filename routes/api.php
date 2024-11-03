<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VehicleAssignmentController;


Route::post('login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware('auth:api')->group(function () {
    Route::get('/vehicle-assignments', [VehicleAssignmentController::class, 'index']);
    Route::post('/vehicle-assignments', [VehicleAssignmentController::class, 'store']);
    Route::put('/vehicle-assignments/{vehicle_id}', [VehicleAssignmentController::class, 'update']);
    Route::delete('/vehicle-assignments/{vehicle_id}', [VehicleAssignmentController::class, 'destroy']);
    Route::get('/vehicle-assignments/{vehicle_id}', [VehicleAssignmentController::class, 'show']);
});

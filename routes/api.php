<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
    
// });
use App\Http\Controllers\Api\BarcodeController;

// Route::post('/barcode', [BarcodeController::class, 'store']);
Route::get('/barcode', [BarcodeController::class, 'index']);
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/barcode', [BarcodeController::class, 'store']);
});

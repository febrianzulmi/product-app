<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
    
// });
use App\Http\Controllers\Api\BarcodeController;

Route::post('/barcode', [BarcodeController::class, 'store']);
Route::get('/barcode', [BarcodeController::class, 'index']);



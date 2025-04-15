<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendefinisikan route API untuk aplikasi kamu.
| Route ini otomatis memiliki prefix "api", misal: http://localhost:8000/api/cards
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// GET semua data card (gambar/gif/video)
Route::get('/cards', [CardController::class, 'index']);

// POST simpan card baru ke database
Route::post('/cards', [CardController::class, 'store']);

// GET satu card berdasarkan ID
Route::get('/cards/{id}', [CardController::class, 'show']);

// PUT update data card
Route::put('/cards/{id}', [CardController::class, 'update']);

// DELETE hapus card berdasarkan ID
Route::delete('/cards/{id}', [CardController::class, 'destroy']);

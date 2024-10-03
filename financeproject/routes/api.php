<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



// Temporarily make transaction routes public for testing
Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/{id}', [TransactionController::class, 'show']);
Route::put('/transactions/{id}', [TransactionController::class, 'update']);
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

// Protected routes (will require authentication later)
// You can re-enable this when you need authentication
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/transactions', [TransactionController::class, 'store']);
//     Route::get('/transactions', [TransactionController::class, 'index']);
//     Route::get('/transactions/{id}', [TransactionController::class, 'show']);
//     Route::put('/transactions/{id}', [TransactionController::class, 'update']);
//     Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
// });

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);



Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});


Route::get('/crud', [CrudController::class, 'index']);
Route::post('/crud', [CrudController::class, 'store']);
Route::get('/crud/{id}', [CrudController::class, 'show']);
Route::get('/crud/edit/{id}', [CrudController::class, 'edit']);
Route::put('/crud/edit/{id}', [CrudController::class, 'managed']);
Route::delete('/crud/removed/{id}', [CrudController::class, 'removed']);

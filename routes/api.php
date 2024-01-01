<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DailyHitController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\CycletimeController;
use App\Http\Controllers\HeadcountController;

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

//Key performance indicator routes for headcounts
Route::get('/headcounts', [HeadcountController::class, 'headcountIndex']);
Route::post('/headcounts', [HeadcountController::class, 'headcountStore']);
Route::get('/headcounts/{id}', [HeadcountController::class, 'headcountShow']);
Route::get('/headcounts/edit/{id}', [HeadcountController::class, 'headcountEdit']);
Route::put('/headcounts/edit/{id}', [HeadcountController::class, 'headcountUpdate']);
Route::delete('/headcounts/removed/{id}', [HeadcountController::class, 'headcountRemoved']);

//Key performance indicator routes for cycletime
Route::get('/cycletime', [CycletimeController::class, 'cycletimeIndex']);
Route::post('/cycletime', [CycletimeController::class, 'cycletimeStore']);
Route::get('/cycletime/{id}', [CycletimeController::class, 'cycletimeShow']);
Route::get('/cycletime/edit/{id}', [CycletimeController::class, 'cycletimeEdit']);
Route::put('/cycletime/edit/{id}', [CycletimeController::class, 'cycletimeUpdate']);
Route::delete('/cycletime/removed/{id}', [CycletimeController::class, 'cycletimeRemoved']);

//Key performance indicator routes for planning request
Route::get('/planning', [PlanningController::class, 'planningIndex']);
Route::post('/planning', [PlanningController::class, 'planningStore']);
Route::get('/planning/{id}', [PlanningController::class, 'planningShow']);
Route::get('/planning/edit/{id}', [PlanningController::class, 'planningEdit']);
Route::put('/planning/edit/{id}', [PlanningController::class, 'planningUpdate']);
Route::delete('/planning/removed/{id}', [PlanningController::class, 'planningRemoved']);

//Key performance indicator routes for overtime
Route::get('/overtime', [OvertimeController::class, 'overtimeIndex']);
Route::post('/overtime', [OvertimeController::class, 'overtimeStore']);
Route::get('/overtime/{id}', [OvertimeController::class, 'overtimeShow']);
Route::get('/overtime/edit/{id}', [OvertimeController::class, 'overtimeEdit']);
Route::put('/overtime/edit/{id}', [OvertimeController::class, 'overtimeUpdate']);
Route::delete('/overtime/removed/{id}', [OvertimeController::class, 'overtimeRemoved']);


Route::get('/daily', [DailyHitController::class, 'dailyIndex']);
Route::post('/daily', [DailyHitController::class, 'dailyStore']);

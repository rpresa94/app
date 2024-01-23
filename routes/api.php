<?php

use App\Http\Controllers\Api\FarmResponsibilityController;
use App\Http\Controllers\Api\PersonnelController;
use App\Http\Controllers\Api\SupplyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('personnel', PersonnelController::class);

Route::apiResource('farm-responsibilities', FarmResponsibilityController::class);

Route::apiResource('supplies', SupplyController::class);

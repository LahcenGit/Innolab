<?php

use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\LaboratoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/patient',PatientController::class);
Route::middleware('auth:sanctum')->apiResource('/labo',LaboratoryController::class);
Route::apiResource('/document',DocumentController::class);
Route::post('/document/update', [App\Http\Controllers\DocumentController::class,'updateDocument']);
Route::post('/login', [App\Http\Controllers\Api\ApiAuthController::class,'login']);





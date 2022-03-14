<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
;

Auth::routes();
Route::get('/dashboard-patient', [App\Http\Controllers\HomeController::class, 'patient']);
Route::resource('/dashboard-patient/profil',ProfilController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

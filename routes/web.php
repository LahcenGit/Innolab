<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {

    if(Auth::guest()){
        return redirect('/');
    }
    else if(Auth::user()->type == 'labo'){
        return redirect('/dashboard-labo');
    }
    else{
        return redirect('/dashboard-patient');
    }
});*/




Route::get('/', function () {
    $error = null;
    return view('welcome',compact('error'));
});







Auth::routes([
    'register' => false,
]);

Route::middleware('AuthInno')->group(function () {
    Route::get('/dashboard-patient',[App\Http\Controllers\HomeController::class,'patient'])->middleware('can:dashboard.patient');;
    Route::get('/dashboard-labo',[App\Http\Controllers\HomeController::class,'labo'])->middleware('can:dashboard.labo');
    Route::get('/dashboard-labo/{id}', [App\Http\Controllers\HomeController::class, 'LabotWithDocument'])->middleware('can:dashboard.labo');
    Route::resource('/dashboard-patient/profil',ProfilController::class)->middleware('can:dashboard.patient');
    Route::get('/dashboard-patient/{year}', [App\Http\Controllers\HomeController::class, 'patientWithYear'])->middleware('can:dashboard.patient');
    Route::get('dashboard-doctor', [App\Http\Controllers\HomeController::class, 'documentDoctor'])->middleware('can:dashboard.doctor');
    Route::get('/dashboard-doctor/{id}', [App\Http\Controllers\HomeController::class, 'documentPatient'])->middleware('can:dashboard.doctor');
    //affichage result patient
    Route::get('/consultation/{name}', [App\Http\Controllers\ConsultationController::class, 'showConsultation']);
    Route::get('/consultation-pdf/{name}', [App\Http\Controllers\ConsultationController::class, 'showPdf']);
    Route::get('/consultation-detail/{month}/{year}', [App\Http\Controllers\HomeController::class, 'document']);
    Route::get('detail-document/{id}', [App\Http\Controllers\HomeController::class, 'detaildocument']);
    Route::get('document/{token}', [App\Http\Controllers\QrcodeController::class, 'qrCode']);
    Route::get('show-file/{token}', [App\Http\Controllers\QrcodeController::class, 'showFile']);
    });



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/contact',ContactController::class);

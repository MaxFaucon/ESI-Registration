<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AddInscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentEditController;
use App\Http\Controllers\PaeController;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/pae', [CoursController::class, 'index']);
    Route::post('pae/ajout', [PaeController::class, "ajout"])->name('pae.ajout');
    Route::get('/inscription', [InscriptionController::class, 'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('/inscriptionV', [AddInscriptionController::class, 'storeUser']);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/cavpReponse', [App\Http\Controllers\HomeController::class, 'selectRep'])->name('selectRep');
    Route::post('dashboard/refuse',[DashboardController::class, 'refuse'])->name('pae.refuse'); 
});

Route::group(['middleware' => 'web'], function () {
    Route::get("/monpae", [CoursController::class, "MesCours"])->name("paeSuccess");
});

Route::post('send', 'FileController@store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/{id}', [DashboardController::class, 'param'])->where('id', '[0-9]+');
Route::get('/dashboard/StudentEdit/{id}', [StudentEditController::class, 'index'])->where('id', '[0-9]+');
Route::post('/dashboard/StudentUpdate/{id}', [StudentEditController::class, 'update'])->where('id', '[0-9]+')->name('StudentUpdate');
Route::get('/cavpview/{id}', [DashboardController::class, 'demand'])->where('id', '[0-9]+');
Route::post('/cavpview/envoyer/{id}', [DashboardController::class, 'envoyer'])->name('envoyer');

Route::get('/dashboard/{id}/cavp', [DashboardController::class, 'viewcavp']);
Route::post('/dashboard/{id}/cavp', [DashboardController::class, 'retourcavp'])->name('retour');

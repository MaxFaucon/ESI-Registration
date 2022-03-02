<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddInscriptionController;
use App\Http\Controllers\addInscrption;
use App\Http\Controllers\DashboardController;


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

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard/delet/{id}',[DashboardController::class, 'delet'])->name('delet');
    Route::get('dashboard/accept/{id}',[DashboardController::class, 'accept'])->name('accept'); 
});

Route::group(['middleware' => ['auth']], function() {
    Route::post('inscription/add',[AddInscriptionController::class, 'storeUser'])->name('inscriptionV');
});
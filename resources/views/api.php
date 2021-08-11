<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('searchApi', [App\Http\Controllers\WebAPIController::class, 'searchApi'])->name('searchApi');
Route::post('getAllQuery', [App\Http\Controllers\WebAPIController::class, 'getAllQuery'])->name('getAllQuery');
Route::post('singleRecord', [App\Http\Controllers\WebAPIController::class, 'singleRecord'])->name('singleRecord');
Route::post('vaccineEmail', [App\Http\Controllers\WebAPIController::class, 'vaccineEmail'])->name('vaccineEmail');
Route::post('updatePatient', [App\Http\Controllers\WebAPIController::class, 'updatePatient'])->name('updatePatient');
Route::post('deletePatient', [App\Http\Controllers\WebAPIController::class, 'deletePatient'])->name('deletePatient');
Route::post('doseCompleteEmail', [App\Http\Controllers\WebAPIController::class, 'doseCompleteEmail'])->name('doseCompleteEmail');
Route::post('getreserved', [App\Http\Controllers\PatientController::class, 'getreserved'])->name('getreserved');
Route::post('registernew', [App\Http\Controllers\WebAPIController::class, 'registernew'])->name('registernew');
Route::post('signin', [App\Http\Controllers\WebAPIController::class, 'signin'])->name('signin');

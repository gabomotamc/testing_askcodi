<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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

Route::prefix('v1')->group(function () {
    Route::get('all-countries', [CountryController::class, 'allCountries'])->name('all-countries');
    Route::get('/countries/name/{name}',[CountryController::class,'getCountriesByName']);
    Route::get('/countries/iso_3/{iso_3}',[CountryController::class,'getCountryByISO3']);
    Route::get('/countries/capital/{capital}',[CountryController::class,'getCountriesByCapital']);

});
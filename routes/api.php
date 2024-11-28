<?php

use App\Http\Controllers\Api\ApiAnneeScolaire;
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

//Annees Scolaires
// Route::apiResource('annees', ApiAnneeScolaire::class);
Route::get('/annees', [ApiAnneeScolaire::class, 'index'])->name('web.annees.index');
Route::get('/annees/create', [ApiAnneeScolaire::class, 'create'])->name('web.annees.create');
Route::post('/annees', [ApiAnneeScolaire::class, 'store'])->name('web.annees.store');
Route::get('/annees/{id}', [ApiAnneeScolaire::class, 'show'])->name('web.annees.show');
Route::delete('/annees/{id}', [ApiAnneeScolaire::class, 'destroy'])->name('web.annees.destroy');




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

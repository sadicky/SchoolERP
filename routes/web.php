<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebAnneeScolaire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Anees Scolaire routes
Route::resource('annees', WebAnneeScolaire::class);
Route::post('/annees/{id}/actif', [WebAnneeScolaire::class,'actif'])->name('actif');
Route::post('/annees/{id}/deactif', [WebAnneeScolaire::class,'deactif'])->name('deactif');
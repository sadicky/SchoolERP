<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeScolaireController;

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
Route::resource('annees', AnneeScolaireController::class);
Route::post('/annees/{id}/actif', [AnneeScolaireController::class,'actif'])->name('actif');
Route::post('/annees/{id}/deactif', [AnneeScolaireController::class,'deactif'])->name('deactif');


//CategoriesOptions routes
Route::resource('categories', CategoryController::class);
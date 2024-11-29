<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SectionController;

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
Route::patch('/annees/{id}/actif', [AnneeScolaireController::class,'actif'])->name('actif');
Route::patch('/annees/{id}/deactif', [AnneeScolaireController::class,'deactif'])->name('deactif');


//CategoriesOptions routes
Route::resource('categories', CategoryController::class);
Route::patch('/categories/{id}/status', [CategoryController::class,'statut'])->name('statut');

//Periodes routes
Route::resource('periodes', PeriodeController::class);

//sections routes
Route::resource('sections', SectionController::class);

//options routes
Route::resource('options', OptionController::class);
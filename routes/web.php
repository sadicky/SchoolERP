<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\CatFraisController;
use App\Http\Controllers\CatPrimeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;

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

//ANNEES SCOLAIRES
Route::get('/annees/annees_passees', [AnneeScolaireController::class, 'annees_passees'])->name('annees.annees_passees');
Route::get('/annees/{id}/restore', [AnneeScolaireController::class, 'restore'])->name('annees.restore');
Route::delete('/annees/{id}/force-delete', [AnneeScolaireController::class, 'forceDelete'])->name('annees.force_delete'); 

Route::resource('annees', AnneeScolaireController::class);
Route::patch('/annees/{id}/actif', [AnneeScolaireController::class,'actif'])->name('actif');
Route::patch('/annees/{id}/deactif', [AnneeScolaireController::class,'deactif'])->name('deactif');

//CATEGORIES
Route::resource('categories', CategoryController::class);
Route::patch('/categories/{id}/status', [CategoryController::class,'statut'])->name('statut');

//PERIODES
Route::resource('periodes', PeriodeController::class);

//SECTIONS
Route::resource('sections', SectionController::class);

//OPTIONS
Route::resource('options', OptionController::class);

//GRADES 
Route::resource('grades', GradeController::class);

//FRAIS SCOLAIRE
Route::resource('frais', FraisController::class);

//CATEGORIES FRAIS SCOLAIRE
Route::resource('categories_frais', CatFraisController::class);
Route::patch('/categories_frais/{id}/affecter', [CatFraisController::class,'affect_option'])->name('affect_option');


//CATEGORIES PRIME
Route::resource('categories_primes', CatPrimeController::class);


//CLASSES
Route::resource('classes', ClasseController::class);
Route::get('/classes/get-options/{section_id}', [ClasseController::class,'get_options'])->name('get_option');


//COURS
Route::resource('cours', CoursController::class);
Route::get('/cours/get-classes/{classe_id}', [CoursController::class,'get_classes']);
Route::get('/cours/{id}/affecter', [CoursController::class,'affect_classes'])->name('get_classes');
Route::patch('/cours/{id}/affecter_classe', [CoursController::class,'affect_cours_classe'])->name('cours.affecter');


//Eleves

Route::get('/eleves/{id}/restore', [EleveController::class, 'restore'])->name('eleves.restore');
Route::delete('/eleves/{id}/force-delete', [EleveController::class, 'forceDelete'])->name('eleves.force_delete'); 

Route::resource('eleves', EleveController::class);

//Enseignants
Route::get('/enseignants/{id}/restore', [EnseignantController::class, 'restore'])->name('enseignants.restore');
Route::delete('/enseignants/{id}/force-delete', [EnseignantController::class, 'forceDelete'])->name('enseignants.force_delete');

Route::resource('enseignants', EnseignantController::class);
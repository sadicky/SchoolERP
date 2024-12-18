<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatFraisController;
use App\Http\Controllers\CatPrimeController;
use App\Http\Controllers\EnseignantController;
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
Route::get('/sections/get-inscription/{section_id}', [SectionController::class,'get_inscription'])->name('get_inscription');


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
Route::get('/eleves/check-tutor', [EleveController::class, 'checkTutor']);
Route::delete('/eleves/{id}/force-delete', [EleveController::class, 'forceDelete'])->name('eleves.force_delete'); 
Route::resource('eleves', EleveController::class);

//Enseignants
Route::get('/enseignants/{id}/restore', [EnseignantController::class, 'restore'])->name('enseignants.restore');
Route::delete('/enseignants/{id}/force-delete', [EnseignantController::class, 'forceDelete'])->name('enseignants.force_delete');
Route::resource('enseignants', EnseignantController::class);

//Parents
Route::resource('parents', TuteurController::class);

//Admin
Route::resource('admins', AdminController::class); 


// Route::prefix('admin')->middleware(['auth:admin', 'role:admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

// Route::prefix('enseignant')->middleware(['auth:enseignant', 'role:enseignant'])->group(function () {
//     Route::get('/dashboard', [EnseignantController::class, 'index'])->name('enseignant.dashboard');
// });


Route::get('/', function () {
    return view('admin');
});

// Admin Login
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.redirect');

// Enseignant Login
Route::get('/teachers/login', [AuthController::class, 'showEnseignantLoginForm'])->name('teacher.login');
Route::post('/teachers/login', [AuthController::class, 'enseignantLogin']);

// Parent Login
Route::get('/tuteurs/login', [AuthController::class, 'showParentLoginForm'])->name('parent.login');
Route::post('/tuteurs/login', [AuthController::class, 'parentLogin']);

// Élève Login
Route::get('/students/login', [AuthController::class, 'showEleveLoginForm'])->name('eleve.login');
Route::post('/students/login', [AuthController::class, 'eleveLogin']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::middleware(['auth:admin'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');

// Route::group(['middleware' => ['auth:admin']], function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

Route::middleware(['auth:enseignant'])->get('/enseignant/dashboard', function () {
    return 'Bienvenue Enseignant';
})->name('enseignant.dashboard');

Route::middleware(['auth:tuteur'])->get('/tuteurs/dashboard', function () {
    return 'Bienvenue Parent';
})->name('tuteur.dashboard');

Route::middleware(['auth:eleve'])->get('/students/dashboard', function () {
    return 'Bienvenue Élève';
})->name('eleve.dashboard');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CahierController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatFraisController;
use App\Http\Controllers\CatPrimeController;
use App\Http\Controllers\PresenceEController;
use App\Http\Controllers\PresencePController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\CommuniqueController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\PrimeController;
use App\Models\Enseignant;
use App\Models\Horaire;
use App\Models\Tuteur;

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    //ANNEES SCOLAIRES
    Route::get('/annees/annees_passees', [AnneeScolaireController::class, 'annees_passees'])->name('annees.annees_passees');
    Route::get('/annees/{id}/restore', [AnneeScolaireController::class, 'restore'])->name('annees.restore');
    Route::delete('/annees/{id}/force-delete', [AnneeScolaireController::class, 'forceDelete'])->name('annees.force_delete');
    Route::resource('annees', AnneeScolaireController::class);
    Route::patch('/annees/{id}/actif', [AnneeScolaireController::class, 'actif'])->name('actif');
    Route::patch('/annees/{id}/deactif', [AnneeScolaireController::class, 'deactif'])->name('deactif');

    //CATEGORIES
    Route::resource('categories', CategoryController::class);
    Route::patch('/categories/{id}/status', [CategoryController::class, 'statut'])->name('statut');

    //PERIODES
    Route::resource('/periodes', PeriodeController::class);

    //SECTIONS
    Route::resource('/sections', SectionController::class);
    Route::get('/sections/get-inscription/{section_id}', [SectionController::class, 'get_inscription'])->name('get_inscription');
    Route::get('/sections/get-periode/{section_id}', [SectionController::class, 'get_periode'])->name('get_periode');;

    //OPTIONS
    Route::resource('/options', OptionController::class);

    //GRADES 
    Route::resource('/grades', GradeController::class);

    //FRAIS SCOLAIRE
    Route::resource('/frais', FraisController::class);

    //CATEGORIES FRAIS SCOLAIRE
    Route::resource('/categories_frais', CatFraisController::class);
    Route::patch('/categories_frais/{id}/affecter', [CatFraisController::class, 'affect_option'])->name('affect_option');


    //CATEGORIES PRIME
    Route::resource('categories_primes', CatPrimeController::class);


    //CLASSES
    Route::resource('classes', ClasseController::class);
    Route::get('/classes/get-cours/{classe_id}', [ClasseController::class, 'get_cours'])->name('get_cours');
    Route::get('/classes/get-options/{section_id}', [ClasseController::class, 'get_options'])->name('get_option');


    //COURS
    Route::resource('cours', CoursController::class);
    Route::get('/cours/get-classes/{classe_id}', [CoursController::class, 'get_classes']);
    Route::get('/cours/{id}/affecter', [CoursController::class, 'affect_classes'])->name('get_classes');
    Route::patch('/cours/{id}/affecter_classe', [CoursController::class, 'affect_cours_classe'])->name('cours.affecter');
    // Route::get('/classes/get-classe/{section_id}', [ClasseController::class,'get_options'])->name('get_option');


    //Eleves
    Route::get('/eleves/{id}/restore', [EleveController::class, 'restore'])->name('eleves.restore');
    Route::get('/eleves/check-tutor', [EleveController::class, 'checkTutor']);
    Route::delete('/eleves/{id}/force-delete', [EleveController::class, 'forceDelete'])->name('eleves.force_delete');
    Route::resource('eleves', EleveController::class);
    Route::post('/eleves/search', [FicheController::class, 'search'])->name('eleves.search');
    Route::get('/eleves/{id}/bulletinm', [FicheController::class, 'bulletinM'])->name('bulletinm');
    Route::get('/eleves/{id}/bulletinp', [FicheController::class, 'bulletinP'])->name('bulletinp');
    Route::get('/eleves/{id}/bulletin', [FicheController::class, 'bulletin'])->name('bulletin');

    //Enseignants
    Route::get('/enseignants/{id}/restore', [EnseignantController::class, 'restore'])->name('enseignants.restore');
    Route::delete('/enseignants/{id}/force-delete', [EnseignantController::class, 'forceDelete'])->name('enseignants.force_delete');
    Route::resource('enseignants', EnseignantController::class);

    //Parents
    Route::resource('parents', TuteurController::class);

    //Admin
    Route::resource('admins', AdminController::class);

    //Fiche de Cotation
    Route::resource('fiches', FicheController::class);
    Route::post('/fiches/{cours_id}', [FicheController::class, 'store']);
    // Route::get('fiches', [FicheController::class, 'index']);

    //Fiche de Cotation
    Route::resource('cahiers', CahierController::class);

    //Note & Bulletin
    Route::resource('notes', NoteController::class);


    //Presence Eleve
    Route::resource('presencee', PresenceEController::class);
    Route::post('/presencee/search', [PresenceEController::class, 'search'])->name('presencee.search');
    Route::post('/presencee/filter', [PresenceEController::class, 'filter'])->name('presencee.filter');

    //Presence Personnel
    Route::resource('presencep', PresencePController::class);


    //Communiques
    Route::get('/communiques/{id}/restore', [CommuniqueController::class, 'restore'])->name('communiques.restore');
    Route::delete('/communiques/{id}/force-delete', [CommuniqueController::class, 'forceDelete'])->name('communiques.force_delete');

    Route::resource('communiques', CommuniqueController::class);

    //Horaires
    Route::get('/horaires/{id}/restore', [HoraireController::class, 'restore'])->name('horaires.restore');
    Route::delete('/horaires/{id}/force-delete', [HoraireController::class, 'forceDelete'])->name('horaires.force_delete');

    Route::resource('horaires', HoraireController::class);

    //Primes
    Route::resource('primes', PrimeController::class);
});



Route::prefix('teachers')->middleware(['auth:enseignant'])->group(function () {
    Route::get('/dashboard', [EnseignantController::class, 'dashboard'])->name('enseignant.dashboard');

    Route::get('/', [AuthController::class, 'showEnseignantLoginForm'])->name('login');
    Route::get('/login', [AuthController::class, 'showEnseignantLoginForm'])->name('login');
    //Eleves
    Route::get('my_students', [EleveController::class, 'eleves_from_teacher'])->name('t.eleves');
    //Eleves
    Route::get('camarades', [EnseignantController::class, 'camarades'])->name('t.enseignants');

    Route::get('my_schedule', [HoraireController::class, 'my_schedule'])->name('t.horaires');
});


Route::prefix('students')->middleware(['auth:eleve'])->group(function () {
    Route::get('/dashboard', [EleveController::class, 'dashboard_eleve'])->name('eleve.dashboard');

    Route::get('/', [AuthController::class, 'showEleveLoginForm'])->name('login');
    Route::get('/login', [AuthController::class, 'showEleveLoginForm'])->name('login');

    Route::get('schedule', [HoraireController::class, 'schedule_e'])->name('e.horaires');
});

Route::prefix('tuteurs')->middleware(['auth:tuteur'])->group(function () {
    Route::get('/dashboard', [TuteurController::class, 'dashboard'])->name('tuteur.dashboard');

    Route::get('/', [AuthController::class, 'showParentLoginForm'])->name('login');
    Route::get('/login', [AuthController::class, 'showParentLoginForm'])->name('login');
});


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


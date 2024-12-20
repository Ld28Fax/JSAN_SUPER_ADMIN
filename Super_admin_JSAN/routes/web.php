<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourAppelController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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
App::setLocale('fr'); // ou 'en' pour anglais



Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', [HomeController::class, 'home_liste'])->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/demandeur', [DemandeurController::class,'index'])->middleware(['auth', 'verified'])->name('demandeurs.index');

Route::post('/demandeur', [DemandeurController::class,'create'])->middleware(['auth', 'verified'])->name('demandeurs.index');

Route::get('/demandeur_liste', [DemandeurController::class,'liste'])->middleware(['auth', 'verified'])->name('demandeurs.liste');

Route::get('/demandeur_exportation', [DemandeurController::class,'exportation'])->middleware(['auth', 'verified'])->name('demandeurs.exportation');


Route::get('/calendrier', [CalendrierController::class,'index'])->middleware(['auth','verified'])->name('calendrier');

Route::get('/Actif/{id?}', [DemandeurController::class,'actif'])->middleware(['auth','verified'])->name('demandeurActiver');

Route::get('/Non_actif/{id?}', [DemandeurController::class,'non_actif'])->middleware(['auth','verified'])->name('demandeurDesactiver');

Route::get('/About', [AboutController::class,'index'])->name('About');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contactUser', [ContactController::class, 'contact'])->name('contact');


Route::get('/demandeurs/edit/{id}', [DemandeurController::class, 'edit'])->name('demandeurs.edit');
Route::post('/demandeurs', [DemandeurController::class, 'update'])->name('demandeurs.update');

Route::post('/periode', [PeriodeController::class,'store']);

Route::get('statistic', [PeriodeController::class, 'getStatistic'])->name('Periode');

Route::get('/liste_utilisateur', [UtilisateurController::class, 'index'])->name('Utilisateur');

Route::get('/error-page', function () {
    return view('error-page');
})->name('error.page');

Route::get('/Cour_appel', [UtilisateurController::class, 'index'])->name('Utilisateur');
Route::get('/UtilisateurTpi/{id?}', [CourAppelController::class, 'Utilisateur'])->name('UtilisateurTpi');

Route::get('/statiqtique', [DemandeurController::class, 'filtrerStatistiques'])->name('statistique');

Route::post('/filtrer-statistiques', [DemandeurController::class, 'filtrerStatistiques'])->name('filtrer_statistiques');

require __DIR__.'/auth.php';

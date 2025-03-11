<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TournoiController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;
use App\Http\Middleware\auth;
use App\Models\Tournoi;
use App\Models\Equipe;
use App\Models\User;


Route::get('/', function () {
    return redirect('/accueil');
});

Route::get('/accueil', function () {
    $tournoisN = Tournoi::where('dateFin', '>=', date('Y-m-d'))->get();
    $tournoisP = Tournoi::where('dateFin', '<', date('Y-m-d'))->get();
    $joueurs = User::orderBy('score', 'desc')->take(5)->get();
    return view('accueil')->with('tournoisN', $tournoisN)->with('tournoisP', $tournoisP)->with('joueurs', $joueurs);
})->name('accueil');

//A finir
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/equipes', [EquipeController::class,'index'])->name('equipes');

Route::get('/equipe/{id}', [EquipeController::class,'show'])->name('equipe');

Route::get('/joueur/{id}', [UtilisateurController::class,'joueur'])->name('joueur');
Route::get('/joueurs', [UtilisateurController::class,'index'])->name('joueurs');

Route::get('/tournoi/{id}', [TournoiController::class,'tournoi'])->name('tournoi');


//A finir
Route::get('/tournois', function () {
    return view('tournois')->with('tournois', Tournoi::all());
})->name('tournois');

Route::get('/inscription', [ConnexionController::class, 'inscription'])->name('inscription');
Route::post('/inscription', [ConnexionController::class, 'store'])->name('traitementInscription');

Route::get('/connexion', [ConnexionController::class, 'index'])->name('connexion');
Route::post('/connexion', [ConnexionController::class, 'connexion'])->name('traitementConnexion');

Route::middleware([auth::class])->group(function () {
    Route::get('/profile', [ConnexionController::class, 'profile'])->name('profile');
    Route::get('/deconnexion', [ConnexionController::class, 'deconnexion'])->name('deconnexion');
});

Route::middleware([auth::class, admin::class])->group(function () {
    // Route::get('/admin', [UtilisateurController::class, 'pannel'])->name('admin');
    // Route::get('/admin/equipes', [EquipeController::class, 'index'])->name('adminEquipes');
    // Route::get('/admin/tournois', [TournoiController::class, 'admin'])->name('adminTournois');
    // Route::get('/admin/utilisateurs', [UtilisateurController::class, 'admin'])->name('adminUtilisateurs');
    // Route::get('/admin/equipe/{id}', [EquipeController::class, 'adminEquipe'])->name('adminEquipe');
    // Route::get('/admin/tournoi/{id}', [TournoiController::class, 'adminTournoi'])->name('adminTournoi');
    // Route::get('/admin/utilisateur/{id}', [UtilisateurController::class, 'adminUser'])->name('adminUtilisateur');
    // Route::get('/admin/inscription', [UtilisateurController::class, 'adminInscription'])->name('adminInscription');
});

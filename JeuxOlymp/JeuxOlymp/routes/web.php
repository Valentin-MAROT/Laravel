<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth;

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('jeux', function () {
    return view('jeux');
})->name('jeux');

Route::get('equipes', function () {
    return view('equipes')->with('equipes', App\Models\Team::all());
})->name('equipes');

Route::get('/connexion', function () {
    
    return view('connexion');
})->name('connexion');

Route::post('/connexion', [auth::class, 'login'])->name('connexionLogin');

Route::post('/deconnexion', [auth::class, 'logout'])->name('deconnexion');

Route::get('profile', function () {
    return view('profile');
})->name('profile');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tournoi;

class UtilisateurController extends Controller
{
    public function joueur($id)
    {
        $equipes = User::find($id)->equipes;
        $victoires = 0;
        foreach ($equipes as $equipe) {
            if (Tournoi::find($equipe->tournoi_id)->EquipeVainqueur == $equipe->name) {
                $victoires++;
            }
        }
        return view('user')->with('user', User::find($id))->with('equipes', $equipes)->with('victoires', $victoires);
    }

    public function index()
    {
        return view('users')->with('users', User::all());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournoi;

class TournoiController extends Controller
{
    public function tournoi($id)
    {
        $tournoi = Tournoi::find($id);
        $equipes = $tournoi->equipes;
        return view('Tournoi', ['tournoi' => $tournoi, 'equipes' => $equipes]);
    }
}

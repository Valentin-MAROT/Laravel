<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\User;


class EquipeController extends Controller
{
    public function index()
    {
        return view('equipes')->with('equipes', Equipe::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'tournoi_id' => 'required',
        ]);
        if(Equipe::where('name', $request->name)->where('tournoi_id', $request->tournoi_id)->exists()){
            return back()->with('error', 'Equipe already exists or name is already taken');
        }
        $equipe = new Equipe();
        if($request->hasFile('image_url')){
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/equipes/', $filename);
            $equipe->image_url = $filename;
        } else {
            $equipe->image_url = file('uploads/equipes/default.png');
        }
        $equipe->name = $request->name;
        $equipe->tournoi_id = $request->tournoi_id;
        $equipe->save();
        return back()->with('success', 'Equipe created successfully');
    
    }

    public function destroy($id)
    {
        Equipe::destroy($id);
        return back()->with('success', 'Equipe deleted successfully');
    }

    public function edit($id)
    {
        return view('edit-equipe')->with('equipe', Equipe::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'tournoi_id' => 'required',
        ]);
        $equipe = Equipe::find($id);
        if($request->hasFile('image_url')){
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/equipes/', $filename);
            $equipe->image_url = $filename;
        }
        $equipe->name = $request->name;
        $equipe->tournoi_id = $request->tournoi_id;
        $equipe->save();
        return back()->with('success', 'Equipe updated successfully');
    }

    public function show($id)
    {
        $equipe = Equipe::find($id);
        //les joueurs de l'équipe sont situés dans une table pivot entre les joueurs et les équipes
        $joueurs = User::whereHas('equipes', function($query) use ($id){
            $query->where('equipe_id', $id);
        })->get();
        return view('equipe')->with('equipe', $equipe)->with('joueurs', $joueurs);
    }
}

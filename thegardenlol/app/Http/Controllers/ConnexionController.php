<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class ConnexionController extends Controller
{
    public function index()
    {
        $fields = [['name' => 'email','label' => 'Adresse email', 'type' => 'email'], ['name' => 'password', 'label' => 'Mot de passe', 'type' => 'password']];
        $action = route('traitementConnexion');
        return view('formulaire')->with('fields', $fields)->with('action', $action);
    }

    public function connexion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('accueil')->with('success', 'Vous êtes connecté');
        }

        return back()->withErrors('Mauvais identifiants');
    }

    public function deconnexion()
    {
        auth()->logout();
        if(auth()->check()) {
            return back()->withErrors('Une erreur est survenue lors de la déconnexion');
        }
        return redirect()->route('accueil');
    }

    public function inscription()
    {
        $fields = [['name' => 'username','label' => 'Nom d\'utilisateur', 'type' => 'text'], ['name' => 'email','label' => 'Adresse email', 'type' => 'email'], ['name' => 'password', 'label' => 'Mot de passe', 'type' => 'password'], ['name' => 'password_confirmation', 'label' => 'Confirmer le mot de passe', 'type' => 'password']];
        return view('formulaire')->with('action', route('traitementInscription'))->with('fields', $fields);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if(User::where('email', $request->email)->exists()) {
            return back()->withErrors('Un compte est déjà associé à cette adresse email');
        }
        if(User::where('username', $request->username)->exists()) {
            return back()->withErrors('Ce nom d\'utilisateur est déjà pris');
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach(Role::where('slug', 'user')->first());

        auth()->login($user);

        return redirect()->route('accueil');
    }

    public function admin()
    {
        return view('admin')->with('users', User::all());
    }

    public function adminUser($id)
    {
        return view('adminUser')->with('user', User::find($id));
    }

    public function adminInscription()
    {
        return view('adminInscription');
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        if(!User::where('username', $request->username)->exists()) {
            return back()->withErrors('Aucun utilisateur trouvé');
        }

        $user = User::where('username', $request->username)->first();

        $user->roles()->attach(Role::where('slug', 'admin')->first());

        return redirect()->route('accueil');

    }
}

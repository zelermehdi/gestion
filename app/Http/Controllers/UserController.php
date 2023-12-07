<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Locataire;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        
        // Récupérer tous les utilisateurs
        $users = User::all();

        // Vous pouvez maintenant utiliser la variable $users comme bon vous semble
        return view('sources.Utilisateurs', ['users' => $users]);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('sources.Utilisateurs.edit', ['user' => $user]);
    }



    public function show($id)
    {
        $user = User::findOrFail($id);
        $locataire = Locataire::where('user_id', $id)->first();
    
        return view('sources.info-utilisateur', ['user' => $user, 'locataire' => $locataire]);
    }



public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return view('sources.supprimer-utilisateur');
}

}
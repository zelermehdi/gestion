<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locataire;

class LocataireController extends Controller
{
    public function create()
    {
        return view('locataires.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id', // Assurez-vous que l'ID utilisateur existe dans la table users

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postalcode' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:locataires,email',
            'birth_date' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'idcard_number' => 'required|string|max:50|unique:locataires,idcard_number',
        ]);

        Locataire::create($data);

        return redirect()->route('locataires.create')->with('success', 'Locataire ajouté avec succès!');
    }
    public function index()
{
    $locataires = Locataire::all();
    return view('locataires.index', compact('locataires'));
}
}

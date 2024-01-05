<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return redirect()->route('locataires')->with('success', 'Locataire ajouté avec succès!');
        
    }
    public function index()
{
    $locataires = Locataire::all();
    return view('locataires.index', compact('locataires'));
}
public function destroy($id)
{
    try {
        $locataire = Locataire::findOrFail($id);  // Récupère le locataire par son ID
        $locataire->delete();
        return redirect()->route('locataires.index')->with('success', 'Locataire supprimé avec succès!');
    } catch (\Exception $e) {
        Log::error('Erreur lors de la suppression du locataire', ['error' => $e->getMessage()]);
        return redirect()->route('locataires.index')->with('error', 'Erreur lors de la suppression du locataire.');
    }
}

public function show($id)
{
    $locataire = Locataire::findOrFail($id);  // Récupère le locataire par son ID
    return view('locataires.edit', compact('locataire'));  // J'ai supposé que vous aviez une vue 'locataires.edit'. Si ce n'est pas le cas, ajustez le chemin en conséquence.
}

public function update(Request $request, $id)
{
    $locataire = Locataire::findOrFail($id);  // Récupère le locataire par son ID

    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'postalcode' => 'required|string|max:10',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'email' => 'required|email|unique:locataires,email,' . $id,  // Ajout de l'ID pour l'unicité
        'birth_date' => 'required|date',
        'place_of_birth' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'idcard_number' => 'required|string|max:50|unique:locataires,idcard_number,' . $id,  // Ajout de l'ID pour l'unicité
    ]);

    $locataire->update($validatedData);
    return redirect()->route('locataires.index')->with('success', 'Locataire mis à jour avec succès!');
}

}

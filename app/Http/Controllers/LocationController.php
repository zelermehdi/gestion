<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location; // Assurez-vous d'importer le modèle Location si vous avez un tel modèle.

class LocationController extends Controller
{
    public function create()
    {
        // Vous pouvez éventuellement charger des données pour les sélecteurs si nécessaire.
        return view('locations.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:property_types,id',
            'locataire_id' => 'required|exists:locataires,id',
            'bail_type_id' => 'required|exists:bail_types,id',
            'loyer' => 'required|numeric',
            'charges' => 'required|numeric',
            'preavis' => 'required|numeric',
            'date_signature_bail' => 'required|date',
            'date_entree' => 'required|date',
        ]);

        // Création de la location
        Location::create($data);

        // Redirection avec un message de succès
        return redirect()->route('locations.create')->with('success', 'Locataire ajouté avec succès!');
    }
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
}

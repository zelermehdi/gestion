<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function destroy($id)
    {
        try {
            $location = Location::findOrFail($id);  // Récupère la location par son ID
            $location->delete();
            return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting location', ['error' => $e->getMessage()]);
            return redirect()->route('locations.index')->with('error', 'Error deleting location.');
        }
    }
    
    public function show($id)
    {
        $location = Location::findOrFail($id);  // Récupère la location par son ID
        return view('locations.edit', compact('location')); // J'ai supposé que vous aviez une vue 'locations.edit'. Si ce n'est pas le cas, ajustez le chemin en conséquence.
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);  // Récupère la location par son ID

        $validatedData = $request->validate([
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

        $location->update($validatedData);
        return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
    }
    public function edit($id)
{
    $location = Location::findOrFail($id);
    return view('locations.edit', compact('location'));
}
}










<?php

// app/Http/Controllers/PropertyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property; // Assurez-vous d'importer le modèle Property

class PropertyController extends Controller
{
    public function create()
    {
        return view('propertys.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'nb_rooms' => 'required|integer|min:1',
            'size' => 'required|numeric|min:1',
            'furnished' => 'required',
            'property_type_id' => 'required',
            'user_id' => 'required|exists:users,id',

        ]);

        Property::create($validatedData);

        return redirect()->route('propertys.create')->with('success', 'Property created successfully!');
    }
    public function index()
    {
        $propertys =Property::all();
        return view('propertys.index', compact('propertys'));
    }
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);  // Récupère la propriété par son ID

        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'nb_rooms' => 'required|integer|min:1',
            'size' => 'required|numeric|min:1',
            'furnished' => 'required',
            'property_type_id' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $property->update($validatedData);
        return redirect()->route('propertys.index')->with('success', 'Property updated successfully!');


    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);  // Récupère la propriété par son ID

        $property->delete();

    }
    public function show($id)
{
    $property = Property::findOrFail($id);  // Récupère la propriété par son ID
    return view('propertys.edit', compact('property'));
}


}

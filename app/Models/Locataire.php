<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function index()
{
    $users = User::with('locataire')->get();
    // 'locataire' correspond à la relation que vous avez définie dans le modèle User

    return view('sources.Utilisateurs.index', ['users' => $users]);
}
}
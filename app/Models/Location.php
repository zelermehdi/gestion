<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function locataire()
    {
        return $this->belongsTo(Locataire::class);
    }

    public function bailType()
    {
        return $this->belongsTo(BailType::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
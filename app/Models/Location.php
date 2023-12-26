<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model {
    use HasFactory;

    protected $fillable = [
		'user_id',
		'property_id',
		'locataire_id',
		'bail_type_id',
		'loyer',
		'charges',
		'preavis',
		'date_signature_bail',
		'date_entree',
	];

    public function user() {
        return $this->belongsTo(User::class);
    }public function property() {
        return $this->belongsTo(Property::class);
    }public function locataire() {
        return $this->belongsTo(Locataire::class);
    }public function bail_type() {
        return $this->belongsTo(Bailtype::class);
    }
}

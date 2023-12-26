<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model {
    use HasFactory;

    protected $fillable = [
		'user_id',
		'first_name',
		'last_name',
		'address',
		'postalcode',
		'country',
		'city',
		'email',
		'birth_date',
		'place_of_birth',
		'nationality',
		'phone_number',
		'idcard_number',
	];

    public function user() {
        return $this->belongsTo(User::class);
    }


	public function locations() {
        return $this->hasMany(Locataire::class);
    }
}
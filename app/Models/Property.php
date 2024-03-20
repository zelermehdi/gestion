<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model {
    use HasFactory;

    protected $fillable = [
        'address',
        'address2',
        'city',
        'postcode',
        'country',
        'nb_rooms',
        'size',
        'furnished',
        'property_type_id',
        'user_id'
	];

    public function user()
{
    return $this->belongsTo(User::class);
}
}

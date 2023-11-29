<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    protected $fillable = ['name', 'display_name', 'is_mandatory'];

    public function propertyType()
    {
        return $this->belongsToMany('App\Models\PropertyType', 'property_type_attributes');
    }
}
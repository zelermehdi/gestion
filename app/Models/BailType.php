<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BailType extends Model
{
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}

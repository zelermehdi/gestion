<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessCard extends Model
{
    

    
        protected $fillable = ['user_id', 'card_number', 'is_active'];
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }


        
    
}

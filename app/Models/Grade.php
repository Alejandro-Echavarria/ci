<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    
    // Relacion una a muchos
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}

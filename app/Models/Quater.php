<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quater extends Model
{
    use HasFactory;

    // Relacion uno a muchos
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    // Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeUser extends Model
{
    use HasFactory;

    // Relacion inversa uno a muchos
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    // Relacion inversa uno a muchos
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

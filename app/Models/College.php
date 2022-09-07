<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    // Relacion uno a muchos
    public function colleges_users()
    {
        return $this->hasMany(College_User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Relacion uno a muchos inversa
    public function quater(){

        return $this->belongsTo(Quater::class);
    }

    // Relacion uno a muchos inversa
    public function grade(){

        return $this->belongsTo(Grade::class);
    }
}

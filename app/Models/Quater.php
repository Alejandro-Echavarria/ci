<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Mutador
use Illuminate\Database\Eloquent\Casts\Attribute;

class Quater extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'user_id'];

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

    public function getCreatedAtAttribute($value)
    {
        if (!empty($value)) {
            
            return Carbon::parse($value)->format('d-m-Y - h:i:s A');
        }
    }

    public function getUpdatedAtAttribute($value)
    {
        if (!empty($value)) {

            return Carbon::parse($value)->format('d-m-Y - h:i:s A');
        }
    }

    protected function name(): Attribute
    {
        return new Attribute (
            set: function ($value) 
            {
                return ucfirst($value);
            }
        );
    }
}

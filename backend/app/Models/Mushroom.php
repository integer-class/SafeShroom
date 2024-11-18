<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mushroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo',
        'is_poisonous',
    ];

    protected $casts = [
        'is_poisonous' => 'boolean',
    ];

    // Relasi ke model Recipe 
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    // Scope untuk jamur beracun
    public function scopePoisonous($query)
    {
        return $query->where('is_poisonous', true);
    }

    // Scope untuk jamur tidak beracun
    public function scopeNonPoisonous($query)
    {
        return $query->where('is_poisonous', false);
    }

    // Atribut status (beracun/tidak beracun)
    public function getStatusAttribute()
    {
        return $this->is_poisonous ? 'Poisonous' : 'Edible';
    }
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}

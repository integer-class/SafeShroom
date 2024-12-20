<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'mushroom_id', 'photo',
    ];

   
    public function mushroom()
    {
        return $this->belongsTo(Mushroom::class);
    }
}

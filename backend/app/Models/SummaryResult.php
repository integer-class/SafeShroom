<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryResult extends Model
{
    use HasFactory;

    protected $fillable = ['mushroom_id', 'summary', 'photo'];

    public function mushroom()
    {
        return $this->belongsTo(Mushroom::class);
    }

 
}

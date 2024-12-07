<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'history';

    // Primary key dari tabel
    protected $primaryKey = 'id_history';

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_user',
        'id_mushroom',
        'id_recommendation',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relasi ke model Mushroom
    public function mushroom()
    {
        return $this->belongsTo(Mushroom::class, 'id_mushroom', 'id');
    }

    // Relasi ke model Recommendation
    public function recommendation()
    {
        return $this->belongsTo(Recommendation::class, 'id_recommendation', 'id');
    }
}

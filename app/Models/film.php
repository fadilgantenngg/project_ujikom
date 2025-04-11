<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_year',
        'genre_id',
        'director',
        'poster',
        'rating',
    ];

    /**
     * Relasi ke model Genre
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'user_id',
        'rating',
        'review',
    ];

    /**
     * Relasi ke model Film.
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'players',
        'challenge',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

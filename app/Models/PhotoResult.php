<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoResult extends Model
{
    protected $fillable = [
        'game_id',
        'word_id',
        'winner_user_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static function factory()
    {

    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'user_game_role')
            ->using(UserGameRole::class)
            ->withPivot('user_id');
    }
}

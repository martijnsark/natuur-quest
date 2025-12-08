<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_game_role')
            ->using(UserGameRole::class) // custom pivot
            ->withPivot('role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_game_role')
            ->using(UserGameRole::class) // custom pivot
            ->withPivot('user_id');
    }
}

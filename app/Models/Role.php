<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static function factory()
    {

    }

    public function games(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'user_game_role')
            ->using(UserGameRole::class)
            ->withPivot('user_id');
    }

    public function assignments(): \Illuminate\Database\Eloquent\Relations\HasMany|Role
    {
        return $this->hasMany(Assignment::class);
    }
}

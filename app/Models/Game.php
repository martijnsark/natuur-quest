<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_game_role')
            ->using(UserGameRole::class) // custom pivot
            ->withPivot('role_id');
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_game_role')
            ->using(UserGameRole::class) // custom pivot
            ->withPivot('user_id');
    }

    public function assignments(): \Illuminate\Database\Eloquent\Relations\HasMany|Game
    {
        return $this->hasMany(Assignment::class);
    }

    // Role.php
    public function assignedUser() {
        return $this->belongsTo(User::class, 'id', 'id')
            ->usingPivot('user_id'); // pseudo-code, explained below
    }

}

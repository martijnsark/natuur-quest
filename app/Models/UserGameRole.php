<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserGameRole extends Pivot
{
    protected $table = 'user_game_role';

    protected $fillable = [
        'user_id',
        'game_id',
        'role_id',
    ];
}

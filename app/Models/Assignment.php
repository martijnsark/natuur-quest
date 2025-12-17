<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['game_id', 'role_id', 'user_id', 'score'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'assignment_word')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

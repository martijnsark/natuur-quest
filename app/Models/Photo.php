<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'assignment_id',
        'word_id',
        'photo',
        'original_name',
        'mime',
        'size',
    ];
}

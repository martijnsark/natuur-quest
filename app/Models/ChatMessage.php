<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ["sender_id", "receiver_id", "message"];

    function sender() {
        return $this->belongsTo(User::class, "sender_id");
    }

    function receiver() {
        return $this->belongsTo(User::class, "receiver_id");
    }
}

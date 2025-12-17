<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('photo_judgements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('word_id');
            $table->unsignedBigInteger('winner_user_id');

            $table->timestamps();

            $table->index(['game_id', 'word_id']);

            $table->foreign('game_id')->references('id')->on('games')->cascadeOnDelete();
            $table->foreign('word_id')->references('id')->on('words')->cascadeOnDelete();
            $table->foreign('winner_user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_judgements');
    }
};

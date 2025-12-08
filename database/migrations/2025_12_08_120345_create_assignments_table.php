<?php

use App\Models\Assignment;
use App\Models\Word;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('game_id')->constrained();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });

        Schema::create('user_game', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Assignment::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Word::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};

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
        Schema::create('assignment_word', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Word::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Assignment::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_word');
    }
};

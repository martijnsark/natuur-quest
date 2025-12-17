<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assignment_id')->constrained('assignments')->cascadeOnDelete();
            $table->foreignId('word_id')->constrained('words')->cascadeOnDelete();

            $table->string('photo'); // pad naar bestand, bv: photos/xxxx.jpg

            $table->timestamps();

            // optioneel: maar vaak handig om dubbele uploads per assignment/word te voorkomen:
            // $table->unique(['assignment_id', 'word_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};


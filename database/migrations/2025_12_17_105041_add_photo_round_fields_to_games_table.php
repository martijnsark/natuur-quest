<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->unsignedBigInteger('photo_round_word_id')->nullable()->after('active');
            $table->unsignedBigInteger('photo_round_winner_user_id')->nullable()->after('photo_round_word_id');
            $table->timestamp('photo_round_judged_at')->nullable()->after('photo_round_winner_user_id');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn([
                'photo_round_word_id',
                'photo_round_winner_user_id',
                'photo_round_judged_at',
            ]);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            // voeg original_name toe als hij nog niet bestaat
            if (!Schema::hasColumn('photos', 'original_name')) {
                $table->string('original_name')->nullable()->after('photo');
            }

            if (!Schema::hasColumn('photos', 'mime')) {
                $table->string('mime')->nullable()->after('original_name');
            }

            if (!Schema::hasColumn('photos', 'size')) {
                $table->unsignedBigInteger('size')->nullable()->after('mime');
            }
        });
    }

    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            if (Schema::hasColumn('photos', 'size')) $table->dropColumn('size');
            if (Schema::hasColumn('photos', 'mime')) $table->dropColumn('mime');
            if (Schema::hasColumn('photos', 'original_name')) $table->dropColumn('original_name');
        });
    }
};

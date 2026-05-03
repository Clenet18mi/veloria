<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_path')->nullable();
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->json('photo_paths')->nullable();
        });

        Schema::table('room_types', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->json('pricing_rules')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function ($table) { $table->dropColumn('avatar_path'); });
        Schema::table('rooms', function ($table) { $table->dropColumn('photo_paths'); });
        Schema::table('room_types', function ($table) { $table->dropColumn(['description', 'pricing_rules']); });
    }
};

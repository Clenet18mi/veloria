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
        if (! Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->foreignId('establishment_id')->constrained()->onDelete('cascade');
                $table->foreignId('room_type_id')->constrained()->onDelete('cascade');
                $table->string('number');
                $table->integer('floor');
                $table->string('status')->default('available');
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->unique(['establishment_id', 'number']);
                $table->index('establishment_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

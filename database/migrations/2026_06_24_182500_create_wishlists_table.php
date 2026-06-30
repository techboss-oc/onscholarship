<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $col) {
            $col->id();
            $col->foreignId('user_id')->constrained()->onDelete('cascade');
            $col->foreignId('program_id')->constrained()->onDelete('cascade');
            $col->timestamps();
            $col->unique(['user_id', 'program_id']); // Prevent duplicates
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};

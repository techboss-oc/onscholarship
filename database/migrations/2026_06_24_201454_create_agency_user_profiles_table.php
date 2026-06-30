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
        Schema::create('agency_user_profiles', function (Blueprint $col) {
            $col->id();
            $col->foreignId('user_id')->constrained()->onDelete('cascade');
            $col->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $col->string('title')->nullable();
            $col->string('first_name')->nullable();
            $col->string('last_name')->nullable();
            $col->string('gender')->nullable();
            $col->string('mobile_phone')->nullable();
            $col->string('country')->nullable();
            $col->string('agency_name')->nullable();
            $col->json('permissions_matrix')->nullable();
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_user_profiles');
    }
};

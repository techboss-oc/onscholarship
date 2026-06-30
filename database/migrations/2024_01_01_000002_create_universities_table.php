<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('city');
            $table->string('province')->nullable();
            $table->string('country')->default('China');
            $table->string('logo')->nullable();
            $table->text('description');
            $table->string('website')->nullable();
            $table->string('established_year')->nullable();
            $table->string('type')->nullable(); // public, private
            $table->string('ranking')->nullable();
            $table->text('facilities')->nullable();
            $table->string('video_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('accepts_scholarship')->default(false);
            $table->string('language_of_instruction')->default('Chinese/English');
            $table->json('gallery')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('degree_level', ['foundation', 'diploma', 'bachelor', 'master', 'phd']);
            $table->string('field_of_study');
            $table->text('description');
            $table->integer('duration_years');
            $table->decimal('tuition_fee_usd', 10, 2)->nullable();
            $table->decimal('tuition_fee_cny', 10, 2)->nullable();
            $table->string('language')->default('English');
            $table->string('intake_months')->nullable(); // September, March
            $table->text('requirements')->nullable();
            $table->text('career_prospects')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('university_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['government', 'university', 'private', 'csc']);
            $table->text('description');
            $table->text('eligibility');
            $table->string('coverage'); // full, partial, tuition only
            $table->decimal('amount_usd', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->date('deadline')->nullable();
            $table->date('intake_date')->nullable();
            $table->integer('available_slots')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarships');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('universities');
    }
};

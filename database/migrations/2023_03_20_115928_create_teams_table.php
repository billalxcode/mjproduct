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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('person_name', 100);
            $table->string('person_position');
            $table->text('person_description');

            // Personal input
            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('linkedin_url')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

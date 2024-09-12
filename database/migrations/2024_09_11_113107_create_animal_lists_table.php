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
        Schema::create('animal_lists', function (Blueprint $table) {
            $table->id();
            $table->string('dog_name');
            $table->string('dog_id_unique');
            $table->string('breed')->nullable();
            $table->string('color')->nullable();
            $table->string('gender')->nullable();
            $table->string('location_found')->nullable();
            $table->date('date_found')->nullable();
            $table->text('description')->nullable();
            $table->integer('report_type')->nullable();
            $table->json('animal_images')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('isActive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_lists');
    }
};

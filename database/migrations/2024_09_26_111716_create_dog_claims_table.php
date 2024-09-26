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
        Schema::create('dog_claims', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');         // Owner's full name
            $table->string('address');          // Owner's address
            $table->text('dog_description');    // Description of the dog
            $table->string('breed')->nullable(); // Dog's breed (nullable in case of unknown)
            $table->string('gender')->nullable(); // Dog's gender (nullable if unknown)
            $table->string('proof');            // Proof of ownership (URL to file or text)
            $table->string('last_loc');         // Last known location where the dog was seen
            $table->string('dog_id_unique');
            $table->string('contact');
            $table->unsignedBigInteger('user_id');
            $table->boolean('isActive')->default(true);
            $table->timestamps();               // Laravel's created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dog_claims');
    }
};

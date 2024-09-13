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
        Schema::create('adoption_forms', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('c_number'); // Contact number
            $table->text('address');
            $table->text('reason');
            $table->boolean('tos_agree')->default(false); // Terms of service agreement
            $table->string('dog_id_unique')->unique(); // Unique dog ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_forms');
    }
};

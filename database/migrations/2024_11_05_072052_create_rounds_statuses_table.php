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
        Schema::create('rounds_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rounds_id');
            $table->boolean('is_approved')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rounds_statuses');
    }
};

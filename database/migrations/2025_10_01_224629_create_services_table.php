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
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // e.g., "Digital Ordering"
        $table->string('icon')->nullable(); // e.g., "fas fa-tablet-alt"
        $table->text('short_description'); // Brief description shown on card
        $table->text('full_description')->nullable(); // Full description for modal
        $table->string('image')->nullable(); // Optional service image
        $table->integer('order')->default(0); // For sorting
        $table->boolean('is_active')->default(true); // Show/hide
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_create_features_table.php
public function up(): void
{
    Schema::create('features', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('icon')->nullable();   // bootstrap icon class or emoji
        $table->string('image')->nullable();  // feature image path
        $table->text('description');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};

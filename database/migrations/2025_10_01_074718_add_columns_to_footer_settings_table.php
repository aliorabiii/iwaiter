<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->text('about_text')->nullable();
            $table->string('link_home')->nullable();
    $table->string('link_about')->nullable();
    $table->string('link_features')->nullable();
    $table->string('link_services')->nullable();
    $table->string('link_testimonials')->nullable();
    $table->string('link_contact')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->dropColumn([
                'logo', 'about_text', 'facebook', 'instagram',
                'linkedin', 'twitter', 'address', 'email', 'phone'
            ]);
        });
    }
};

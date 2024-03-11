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
        Schema::create('listing', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('condition', ['New & Unused', 'Used, Like New', 'Small Wear', 'Major Wear', 'Parts Only']);
            $table->decimal('price');
            $table->text('description');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing');
    }
};

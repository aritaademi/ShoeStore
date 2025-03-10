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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade'); // Relationship with brands
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relationship with categories
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // 8 - Up to 8 digits total, 2 - 2 digits after the decimal point.
            $table->string('image')->nullable(); // For uploaded images, Adds an image column of type VARCHAR to store the file path or URL of the shoe's image.
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};

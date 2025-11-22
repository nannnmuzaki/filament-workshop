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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_category_id')
                ->nullable()
                ->constrained('book_categories')
                ->nullOnDelete();
            $table->string('title', 255);
            $table->foreignId('author_id')
                ->nullable()
                ->constrained('authors')
                ->nullOnDelete();
            $table->string('year', 255);
            $table->longText('synopsis');
            $table->string('pdf_path');
            $table->string('cover_path');
            $table->unsignedInteger('stock');
            // $table->unsignedInteger('available_amount'); Kalau mau nambahin fitur request pinjam sekalian
            // $table->unsignedInteger('borrowed_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

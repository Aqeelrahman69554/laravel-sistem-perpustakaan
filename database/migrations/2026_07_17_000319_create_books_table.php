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
            $table->string('books_image')->nullable();
            $table->string('books_isbn', 13)->unique()->nullable();
            $table->string('books_title');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('books_author')->nullable();
            $table->longText('books_synopsis');
            $table->foreignId('publisher_id')->constrained()->cascadeOnDelete();
            $table->string('books_published')->nullable();
            $table->integer('books_stock')->unsigned();
            $table->string('books_location');
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

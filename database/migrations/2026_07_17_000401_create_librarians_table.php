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
        Schema::create('librarians', function (Blueprint $table) {
            $table->id();
            $table->string('librarian_number')->unique();
            $table->string('librarian_name');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->text('address');

            // For Login System
            $table->string('password');

            // Role
            $table->enum('role', ['Admin','Pustakawan'])->default('Pustakawan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('librarians');
    }
};

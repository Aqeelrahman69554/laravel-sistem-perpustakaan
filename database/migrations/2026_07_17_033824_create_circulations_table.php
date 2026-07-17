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
        Schema::create('circulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->foreignId('book_id')->constrained('books')->cascadeOnDelete();
            $table->foreignId('librarian_id')->constrained('librarians')->cascadeOnDelete();

            // tanggal peminjaman
            $table->date('tanggal_pinjam');
            // tanggal batas kembali
            $table->date('tanggal_batas_kembali');
            // tanggal kembali
            $table->date('tanggal_kembali');

            // status
            $table->enum('status', ['Dipinjam','Kembali','Terlambat','hilang'])->default('Dipinjam');

            // denda
            $table->unsignedInteger('fine_amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circulations');
    }
};

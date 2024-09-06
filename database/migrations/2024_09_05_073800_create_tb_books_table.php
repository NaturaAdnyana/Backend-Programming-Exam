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
        Schema::create('tb_books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->foreignId('id_category')->constrained('tb_categories')->onDelete('cascade');
            $table->foreignId('id_author')->constrained('tb_authors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_books');
    }
};

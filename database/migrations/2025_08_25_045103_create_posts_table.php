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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('id_p');
            $table->string('judul');
            $table->text('konten');
            $table->unsignedBigInteger('kategori_id');
            $table->string('status')->default('published');
            $table->string('image')->nullable();
            $table->timestamps();
            
            $table->foreign('kategori_id')->references('id_k')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

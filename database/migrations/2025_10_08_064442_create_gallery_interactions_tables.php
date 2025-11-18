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
        // Users table (if not exists)
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password')->nullable();
                $table->string('google_id')->nullable();
                $table->string('avatar')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }

        // Gallery Likes table
        Schema::create('gallery_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('gallery_id');
            $table->timestamps();
            
            $table->unique(['user_id', 'gallery_id']);
        });

        // Gallery Views table
        Schema::create('gallery_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('gallery_id');
            $table->timestamps();
        });

        // Gallery Comments table
        Schema::create('gallery_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('gallery_id');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_comments');
        Schema::dropIfExists('gallery_views');
        Schema::dropIfExists('gallery_likes');
    }
};

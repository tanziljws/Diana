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
        Schema::table('gallery', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['post_id']);
            
            // Make post_id nullable
            $table->unsignedBigInteger('post_id')->nullable()->change();
            
            // Re-add foreign key
            $table->foreign('post_id')->references('id_p')->on('posts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['post_id']);
            
            // Make post_id not nullable again
            $table->unsignedBigInteger('post_id')->nullable(false)->change();
            
            // Re-add foreign key with cascade
            $table->foreign('post_id')->references('id_p')->on('posts')->onDelete('cascade');
        });
    }
};

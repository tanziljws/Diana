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
        // Check if table exists before adding column
        if (Schema::hasTable('posts')) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('posts', 'image')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->string('image')->nullable()->after('status');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};

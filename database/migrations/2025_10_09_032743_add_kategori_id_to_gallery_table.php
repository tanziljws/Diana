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
            if (!Schema::hasColumn('gallery', 'kategori_id')) {
                $table->unsignedBigInteger('kategori_id')->nullable()->after('deskripsi');
            }
            // Add foreign key if not exists
            $table->foreign('kategori_id')->references('id_k')->on('kategori')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};

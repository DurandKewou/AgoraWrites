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
        Schema::table('post_tag', function (Blueprint $table) {
            $table->unique(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropUnique(['post_tag_post_id_tag_id_unique']); // nom automatique
        });
    }
};

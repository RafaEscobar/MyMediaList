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
        Schema::table('entertainment', function (Blueprint $table) {
            $table->foreignId('pending_priority_id')->after('user_id')
                ->constrained('pending_priorities')->onDelete('cascade');
            $table->foreignId('post_view_priority_id')->after('pending_priority_id')
                ->constrained('post_view_priorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entertainment', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('sagas', function (Blueprint $table) {
            $table->double('score')->nullable()->after('final_comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sagas', function (Blueprint $table) {
            $table->dropIfExists('score');
        });
    }
};

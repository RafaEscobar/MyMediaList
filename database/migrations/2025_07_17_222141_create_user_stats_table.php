<?php

use App\Models\Category;
use App\Models\User;
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
        Schema::create('user_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();
            $table->unsignedInteger('pendings')->default(0);
            $table->unsignedInteger('declined')->default(0);
            $table->unsignedInteger('favorites')->default(0);
            $table->foreignId('top_category_id')->nullable()->constrained('categories');
            $table->string('top_day')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stats');
    }
};

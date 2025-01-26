<?php

namespace Database\Seeders;

use App\Models\PostViewPriority;
use Illuminate\Database\Seeder;

class PostViewPrioritySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostViewPriority::create(['priority' => 'Verlo de nuevo en unos meses']);
        PostViewPriority::create(['priority' => 'Verlo el próximo año']);
        PostViewPriority::create(['priority' => 'No lo se']);
        PostViewPriority::create(['priority' => 'No volver a verlo']);
    }
}

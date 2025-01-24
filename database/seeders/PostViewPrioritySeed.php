<?php

namespace Database\Seeders;

use App\Models\PostViewPriority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostViewPrioritySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostViewPriority::create(['priority' => 'Volver a verlo en unos meses']);
        PostViewPriority::create(['priority' => 'Verlo el próximo año']);
        PostViewPriority::create(['priority' => 'No lo se']);
        PostViewPriority::create(['priority' => 'No volver a verlo']);
    }
}

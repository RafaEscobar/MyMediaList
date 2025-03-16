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
        PostViewPriority::create([
            'priority' => 'En unos días',
            'description' => '¿Quién me juzgará? jajajaja'
        ]);
        PostViewPriority::create([
            'priority' => 'En unos meses',
            'description' => 'Tomémoslo con paciencia.'
        ]);
        PostViewPriority::create([
            'priority' => 'El próximo año',
            'description' => 'El tiempo perfecto para poder volver a sentir lo mismo, casi como la primera vez...'
        ]);
        PostViewPriority::create([
            'priority' => '¿Quizás?',
            'description' => 'Dejemos que el tiempo lo decida.'
        ]);
        PostViewPriority::create([
            'priority' => 'Jamás',
            'description' => 'No vale la pena perder mi tiempo en esto...'
        ]);
    }
}

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
            'description' => '¿Quién me juzgara? jajajaja'
        ]);
        PostViewPriority::create([
            'priority' => 'En unos meses',
            'description' => 'Estaría genial tomarnos un tiempo'
        ]);
        PostViewPriority::create([
            'priority' => 'Verlo el próximo año',
            'description' => 'El tiempo perfecto para poder volver a sentir lo mismo, casi como la primera vez...'
        ]);
        PostViewPriority::create([
            'priority' => 'No lo se',
            'description' => 'Dudo que esto suceda de nuevo, pero no lo descarto.'
        ]);
        PostViewPriority::create([
            'priority' => 'Jamás',
            'description' => 'No vale la pena perder mi tiempo en esto, ¡EEWWWW!'
        ]);
    }
}

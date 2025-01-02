<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['category' => 'Película']);
        Category::create(['category' => 'Serie']);
        Category::create(['category' => 'Manga']);
        Category::create(['category' => 'Videojuego']);
        Category::create(['category' => 'Anime']);
    }
}

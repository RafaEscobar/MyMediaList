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
        $movie = Category::create([
            'category' => 'Película',
            'subtype_id' => 1
        ]);
        $serie = Category::create([
            'category' => 'Serie',
            'subtype_id' => 2
        ]);
        $manga = Category::create([
            'category' => 'Manga',
            'subtype_id' => 2
        ]);
        $game = Category::create([
            'category' => 'Videojuego',
            'subtype_id' => 1
        ]);
        $anime = Category::create([
            'category' => 'Anime',
            'subtype_id' => 2
        ]);

        $movieImageUrl = storage_path('app/public/images/movie.svg');
        $serieImageUrl = storage_path('app/public/images/serie.svg');
        $mangaImageUrl = storage_path('app/public/images/manga.svg');
        $gameImageUrl = storage_path('app/public/images/game.svg');
        $animeImageUrl = storage_path('app/public/images/anime.svg');

        $movie->addMedia($movieImageUrl)->toMediaCollection('categories');
        $serie->addMedia($serieImageUrl)->toMediaCollection('categories');
        $manga->addMedia($mangaImageUrl)->toMediaCollection('categories');
        $game->addMedia($gameImageUrl)->toMediaCollection('categories');
        $anime->addMedia($animeImageUrl)->toMediaCollection('categories');
    }
}

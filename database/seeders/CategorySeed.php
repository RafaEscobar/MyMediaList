<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = Category::create(['category' => 'Película',]);
        $serie = Category::create(['category' => 'Serie',]);
        $manga = Category::create(['category' => 'Manga',]);
        $game = Category::create(['category' => 'Videojuego',]);
        $anime = Category::create(['category' => 'Anime',]);

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

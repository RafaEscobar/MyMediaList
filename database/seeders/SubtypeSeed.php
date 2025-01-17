<?php

namespace Database\Seeders;

use App\Models\Subtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubtypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subtype::create(['subtype' => 'Media']);
        Subtype::create(['subtype' => 'Saga']);
    }
}

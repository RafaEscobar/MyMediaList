<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Priority::create(['priority' => 'Ya mismo']);
        Priority::create(['priority' => 'En unos días']);
        Priority::create(['priority' => 'En unas semanas']);
        Priority::create(['priority' => 'En unos meses']);
        Priority::create(['priority' => 'Tomémoslo con calma']);
        Priority::create(['priority' => 'Algún día']);
        Priority::create(['priority' => 'No creo verlo']);
        Priority::create(['priority' => 'Repetirlo algún día']);
        Priority::create(['priority' => 'Jamás verlo de nuevo']);
        Priority::create(['priority' => 'Darle otra oportunidad']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PendingPriority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendingPrioritySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PendingPriority::create(['priority' => 'Ver inmediatamente']);
        PendingPriority::create(['priority' => 'Ver en los próximos días']);
        PendingPriority::create(['priority' => 'El próximo mes']);
        PendingPriority::create(['priority' => 'En unos meses']);
        PendingPriority::create(['priority' => 'Algún día']);
    }
}

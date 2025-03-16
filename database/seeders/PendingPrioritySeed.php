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
        PendingPriority::create([
            'priority' => 'Inmediatamente',
            'description' => 'Lo quiero, lo necesito, lo requiero, lo anhelo ahora mismo!!!!!'
        ]);
        PendingPriority::create([
            'priority' => 'En los próximos días',
            'description' => 'Creo poder resistir las ganas unos cuantos días más.'
        ]);
        PendingPriority::create([
            'priority' => 'El próximo mes',
            'description' => 'Supongo que esperar más no está mal.'
        ]);
        PendingPriority::create([
            'priority' => 'En unos meses',
            'description' => 'Creo que en este caso me lo tomaré con calma.'
        ]);
        PendingPriority::create([
            'priority' => 'Algún día',
            'description' => 'Esperaré el momento adecuado.'
        ]);
    }
}

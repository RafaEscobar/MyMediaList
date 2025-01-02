<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['status' => 'Pendiente']);
        Status::create(['status' => 'Visto']);
        Status::create(['status' => 'Declinado']);
        Status::create(['status' => 'No terminado']);
    }
}

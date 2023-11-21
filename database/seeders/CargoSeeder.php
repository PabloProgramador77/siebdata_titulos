<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::create(['descripcion' => 'Director']);
        Cargo::create(['descripcion' => 'Subdirector']);
        Cargo::create(['descripcion' => 'Rector']);
        Cargo::create(['descripcion' => 'Vicerrector']);
        Cargo::create(['descripcion' => 'Responsable de Expedición']);
    }
}

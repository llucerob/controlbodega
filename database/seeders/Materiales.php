<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Materiales extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/sql/materiales.sql');
        
        DB::unprepared(file_get_contents($path));

        $this->command->info('Archivo SQL ejecutado correctamente.');
    }
}

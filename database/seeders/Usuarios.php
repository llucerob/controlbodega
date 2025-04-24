<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'id'   => 1,  
            'name' => 'Leonardo Lucero',
            'email' => 'llucero@serviciosayf.cl',
            'password' => Hash::make('leonardolucero'),
        ],
        [   
            'id'   => 2,
            'name' => 'Talys Orellana',
            'email' => 'torellana@serviciosayf.cl',
            'password' => Hash::make('talysorellana'),
        ],
        [
            'id'   => 3,
            'name' => 'Bodega ',
            'email' => 'bodega@serviciosayf.cl',
            'password' => Hash::make('bodega'),
        ],
        [
            'id'   => 4,
            'name' => 'Francisco Vega',
            'email' => 'fvega@serviciosayf.cl',
            'password' => Hash::make('franciscovega'),
        ],
        [
            'id'   => 5,
            'name' => 'Sebastian Pozo',
            'email' => 'spozo@serviciosayf.cl',
            'password' => Hash::make('sebastianpozo'),
        ],
    ]);


        DB::table('model_has_roles')->insert([
        [
            'role_id'   => 1,  
            'model_type' => 'App\Models\User',
            'model_id' => 1,
            
        ],
        [
            'role_id'   => 2,  
            'model_type' => 'App\Models\User',
            'model_id' => 4,
            
        ],
        [
            'role_id'   => 2,  
            'model_type' => 'App\Models\User',
            'model_id' => 5,
            
        ],
        [
            'role_id'   => 3,  
            'model_type' => 'App\Models\User',
            'model_id' => 3,
            
        ],
        [
            'role_id'   => 4,  
            'model_type' => 'App\Models\User',
            'model_id' => 2,
            
        ],
    ]);
    }
}

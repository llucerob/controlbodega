<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedidasSeeder extends Seeder
{
    public function up()
    {
        DB::table('medidas')->insert([
            ['id' => 1, 'nombre' => 'Bolsa', 'abreviatura' => 'Bols', 'created_at' => '2021-12-27 17:52:25', 'updated_at' => '2021-12-27 17:52:25'],
            ['id' => 3, 'nombre' => 'Galon', 'abreviatura' => 'Gal', 'created_at' => '2021-12-27 17:52:25', 'updated_at' => '2021-12-27 17:52:25'],
            ['id' => 4, 'nombre' => 'Juego', 'abreviatura' => 'Jueg', 'created_at' => '2021-12-27 17:52:25', 'updated_at' => '2021-12-27 17:52:25'],
            ['id' => 7, 'nombre' => 'Par', 'abreviatura' => 'Par', 'created_at' => '2021-12-27 17:52:25', 'updated_at' => '2021-12-27 17:52:25'],
            ['id' => 8, 'nombre' => 'Saco', 'abreviatura' => 'Sco', 'created_at' => '2021-12-27 17:52:25', 'updated_at' => '2021-12-27 17:52:25'],
            ['id' => 13, 'nombre' => 'Unidad', 'abreviatura' => 'Un', 'created_at' => '2022-01-13 14:14:56', 'updated_at' => '2022-01-13 14:14:56'],
            ['id' => 14, 'nombre' => 'litros', 'abreviatura' => 'Lt', 'created_at' => '2022-03-31 12:02:07', 'updated_at' => '2022-03-31 12:02:07'],
            ['id' => 16, 'nombre' => 'Kilos', 'abreviatura' => 'Kg', 'created_at' => '2022-03-31 15:38:54', 'updated_at' => '2022-03-31 15:38:54'],
            ['id' => 17, 'nombre' => 'Metros', 'abreviatura' => 'Mt', 'created_at' => '2022-03-31 15:39:33', 'updated_at' => '2022-03-31 15:39:33'],
            ['id' => 18, 'nombre' => 'Caja', 'abreviatura' => 'Cj', 'created_at' => '2022-03-31 15:40:22', 'updated_at' => '2022-03-31 15:40:22'],
            ['id' => 19, 'nombre' => 'Rollo', 'abreviatura' => 'Roll', 'created_at' => '2022-04-01 20:17:05', 'updated_at' => '2022-04-01 20:17:05'],
            ['id' => 20, 'nombre' => 'Tira', 'abreviatura' => 'Tir', 'created_at' => '2022-04-01 20:17:05', 'updated_at' => '2022-04-01 20:17:05'],
            ['id' => 21, 'nombre' => 'Plancha', 'abreviatura' => 'Plan', 'created_at' => '2022-04-01 20:17:05', 'updated_at' => '2022-04-01 20:17:05'],
            ['id' => 22, 'nombre' => 'cubos', 'abreviatura' => 'cu', 'created_at' => '2022-04-05 15:56:41', 'updated_at' => '2022-04-05 15:56:41'],
            ['id' => 23, 'nombre' => 'Pliego', 'abreviatura' => 'Pliego', 'created_at' => '2024-05-17 14:43:15', 'updated_at' => '2024-05-17 14:43:15'],
        ]);
    }

    public function down()
    {
        DB::table('medidas')->whereIn('id', [
            1, 3, 4, 7, 8, 13, 14, 16, 17, 18, 19, 20, 21, 22, 23
        ])->delete();
    }
}

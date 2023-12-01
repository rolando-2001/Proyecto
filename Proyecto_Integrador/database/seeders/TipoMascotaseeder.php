<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoMascotaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::table('tipo_mascotas')->insert([
            'especie' => 'Perro',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tipo_mascotas')->insert([
            'especie' => 'Gato',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

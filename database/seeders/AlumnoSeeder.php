<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alumnos')->insert([
            [
                'nombre' => 'Juan',
                'telefono' => '600001111',
                'edad' => null,
                'password' => Str::random(64),
                'email' => 'juan@example.com',
                'sexo' => 'masculino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María',
                'telefono' => null,
                'edad' => 25,
                'password' => Str::random(64),
                'email' => 'maria@example.com',
                'sexo' => 'femenino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

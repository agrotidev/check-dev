<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoUsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupo_usuarios')->insert([
            [
                'grupo' => 1,
                'usuario' => 1,
            ],
            [
                'grupo' => 2,
                'usuario' => 1,
            ],
            [
                'grupo' => 1,
                'usuario' => 1,
            ],
        ]);
    }
}

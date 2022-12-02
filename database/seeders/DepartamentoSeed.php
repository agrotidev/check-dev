<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            [
                'cod_departamento' => 1010,
                'nome' => 'Departamento 1',
                'ativo' => true,
            ],
            [
                'cod_departamento' => 2020,
                'nome' => 'Departamento 2',
                'ativo' => true,
            ],
            [
                'cod_departamento' => 4040,
                'nome' => 'Departamento 3',
                'ativo' => true,
            ]
        ]);
    }
}

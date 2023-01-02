<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistGruposSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklist_grupos')->insert([
            [
                'modulo' => 1,
                'user' => 1,
                'nome' => 'GRUPO PADRÃO',
                'descricao' => 'Grupo Padrão',
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'modulo' => 1,
                'user' => 1,
                'nome' => 'GRUPO NOVO',
                'descricao' => 'Grupo Novo',
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'modulo' => 1,
                'user' => 1,
                'nome' => 'GRUPO 3',
                'descricao' => 'Grupo 3',
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}

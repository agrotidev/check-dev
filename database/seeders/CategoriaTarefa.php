<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTarefa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_tarefas')->insert([
            [
                'nome' => 'PADRÃO',
                'descricao' => 'Categoria Padrão',
                'peso' => 0,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'ORGANIZAÇÃO / LIMPEZA',
                'descricao' => 'Categoria Organização e Limpeza',
                'peso' => 2.5,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'MEIO AMBIENTE',
                'descricao' => 'Categoria Meio Ambiente',
                'peso' => 2.5,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'SEGURANCA',
                'descricao' => 'Categoria Segurança',
                'peso' => 5.0,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}

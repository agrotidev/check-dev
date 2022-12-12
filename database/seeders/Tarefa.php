<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tarefa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([
            [
                'checklist' => 1,
                'categoria_tarefa' => 1,
                'nome' => 'Tarefa 1',
                'descricao' => 'Descricão tarefa 1',
                'valor' => 0.80,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist' => 1,
                'categoria_tarefa' => 1,
                'nome' => 'Tarefa 2',
                'descricao' => 'Descricão tarefa 2',
                'valor' => 0.60,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist' => 1,
                'categoria_tarefa' => 2,
                'nome' => 'Tarefa 3',
                'descricao' => 'Descricão tarefa 3',
                'valor' => 0.20,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist' => 1,
                'categoria_tarefa' => 2,
                'nome' => 'Tarefa 4',
                'descricao' => 'Descricão tarefa 4',
                'valor' => 0.20,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist' => 1,
                'categoria_tarefa' => 3,
                'nome' => 'Tarefa 4',
                'descricao' => 'Descricão tarefa 4',
                'valor' => 0.50,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist' => 1,
                'categoria_tarefa' => 3,
                'nome' => 'Tarefa 4',
                'descricao' => 'Descricão tarefa 4',
                'valor' => 0.50,
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}

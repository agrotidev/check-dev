<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Checklist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklists')->insert([
            [
                'checklist_grupo' => 1,
                'setor' => 1,
                'tipo_tarefas' => 3,
                'user' => 2,
                'nome' => 'Checklist 1',
                'descricao' => 'Checklist 1 - primeiro checklist',
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist_grupo' => 1,
                'setor' => 2,
                'tipo_tarefas' => 3,
                'user' => 1,
                'nome' => 'Checklist 2',
                'descricao' => 'Checklist 2 - segundo checklist',
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'checklist_grupo' => 2,
                'setor' => 2,
                'tipo_tarefas' => 3,
                'user' => 1,
                'nome' => 'Checklist 3',
                'descricao' => 'Checklist  - terceiro checklist',
                'ativo' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}

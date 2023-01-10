<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoChecklistSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupo_checklists')->insert([
            [
                'checklist' => 1,
                'grupo' => 1,
            ],
            [
                'checklist' => 1,
                'grupo' => 2,
            ],
            [
                'checklist' => 3,
                'grupo' => 1,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistUsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('checklist_usuarios')->insert([
            [
                'checklist' => 1,
                'usuario' => 2,
                'grupo' => 1
            ],
            [
                'checklist' => 2,
                'usuario' => 2,
                'grupo' => 1
            ],
            [
                'checklist' => 2,
                'usuario' => 1,
                'grupo' => 3
            ],
            [
                'checklist' => 2,
                'usuario' => 2,
                'grupo' => 3
            ],
            [
                'checklist' => 1,
                'usuario' => 1,
                'grupo' => 3
            ],
        ]);
    }
}

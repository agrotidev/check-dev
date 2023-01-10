<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklist_group')->insert([
            [
                'checklist_id' => 1,
                'group_id' => 1,
            ],
            [
                'checklist_id' => 1,
                'group_id' => 2,
            ],
            [
                'checklist_id' => 3,
                'group_id' => 1,
            ],
        ]);
    }
}

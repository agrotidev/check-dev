<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_group')->insert([
            [
                'group_id' => 1,
                'user_id' => 1,
            ],
            [
                'group_id' => 2,
                'user_id' => 1,
            ],
            [
                'group_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}

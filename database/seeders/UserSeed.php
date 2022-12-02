<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'setor' => '1',
                'code' => 8146,
                'name' => 'Thiago',
                'email' => 'thiago@email.com',
                'password' => bcrypt('123456')
            ]
        ]);
    }
}

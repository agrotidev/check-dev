<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'modulo' => '1',
                'ismanager' => true,
                'islider' => true,
                'active' => true,
                'web' => true,
                'mobile' => true,
                'code' => 8146,
                'name' => 'Thiago',
                'email' => 'thiago@email.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

        DB::table('users')->insert([
            [
                'setor' => '1',
                'modulo' => '1',
                'code' => 8080,
                'name' => 'JeremiasM',
                'email' => 'jeremias@email.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}

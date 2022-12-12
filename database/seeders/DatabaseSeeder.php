<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(DepartamentoSeed::class);
        $this->call(SetorSeed::class);
        $this->call(AdminSeeed::class);
        $this->call(UserSeed::class);
        $this->call(CategoriaTarefa::class);
        $this->call(TipoTarefa::class);
        $this->call(Checklist::class);
        $this->call(Tarefa::class);
    }
}

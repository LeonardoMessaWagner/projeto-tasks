<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Leonardo',
            'email' => 'leonardowagner22@outlook.com',
            'password' => bcrypt('12345678'),
        ]);
        Tarefa::factory(11)->create();
    }
}
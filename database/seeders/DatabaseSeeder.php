<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\TaskGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Diego',
            'email' => 'diego@exemplo.com',
            'password' => Hash::make('11111111'),
            'is_admin' => true,
        ]);

        \App\Models\User::factory(100)->create();

        TaskGroup::factory(5)->create();

        Task::factory(200)->create();
    }
}

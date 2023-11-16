<?php

declare(strict_types=1);

namespace Database\Factories\Admin;

use App\Models\TaskGroup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'task_group_id' => TaskGroup::all()->random()->id,
            'title' => fake()->sentence(3),
            'description' => fake()->text(),
        ];
    }
}

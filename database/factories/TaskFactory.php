<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Statuses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(4),
            'details' => fake()->sentence(1),
            'user_id' => User::where('is_admin', false)->get()->random()->id,
            'created_by' => User::where('is_admin', true)->get()->random()->id,
            'status_id' => Statuses::where('name', 'Not yet started')->first()->id,
        ];
    }
}

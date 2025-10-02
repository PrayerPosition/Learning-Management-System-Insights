<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'slug' => fake()->slug(),
            'is_published' => fake()->boolean(),
            'price' => fake()->randomFloat(2, 0, 100),
            'duration_hours' => fake()->numberBetween(1, 10),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
        ];
    }
}

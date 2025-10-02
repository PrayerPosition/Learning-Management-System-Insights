<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Courses;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lessons>
 */
class LessonsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(),
            'video_url' => fake()->url(),
            'duration_minutes' => fake()->numberBetween(1, 100),
            'order' => fake()->numberBetween(1, 100),
            'is_published' => fake()->boolean(),
            'is_free' => fake()->boolean(),
            'course_id' => Courses::factory(),
        ];
    }
}

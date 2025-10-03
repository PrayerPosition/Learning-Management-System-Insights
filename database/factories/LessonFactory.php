<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'content' => fake()->paragraphs(2, true),
            'video_url' => fake()->url(),
            'duration_minutes' => fake()->numberBetween(5, 60),
            'order' => 1, // will be handled by seeder/factory sequence
        ];
    }

    /**
     * Set a specific order number (useful when creating multiple lessons for a course)
     */
    public function withOrder(int $order): self
    {
        return $this->state(fn () => ['order' => $order]);
    }
}

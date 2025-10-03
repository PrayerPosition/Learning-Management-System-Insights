<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'duration_hours' => fake()->numberBetween(1, 50),
            'difficulty' => fake()->randomElement(['easy', 'intermediate', 'hard']),
            'lessons_count' => 0, // will be updated in afterCreating
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            $course->update([
                'lessons_count' => $course->lessons()->count(),
            ]);
        });
    }
}

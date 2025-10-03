<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory(5)->create()
            ->each(function ($course) {

                // For each course, create 3–7 lessons
                Lesson::factory(rand(3, 7))
                    ->create(['course_id' => $course->id])
                    ->each(function ($lesson, $index) {
                        // Assign sequential order
                        $lesson->order = $index + 1;
                        $lesson->save();
                    });

                // Update cached lessons count
                $course->update(['lessons_count' => $course->lessons()->count()]);
            });
    }
}

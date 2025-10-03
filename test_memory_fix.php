<?php

require_once __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Course;
use App\Models\Lesson;

echo "Testing Course factory with lessons (this was causing memory exhaustion)...\n";

try {
    // This was the command that was failing
    $course = Course::factory()->has(Lesson::factory()->count(3))->create();

    echo "✅ SUCCESS! No memory exhaustion!\n";
    echo 'Course created: '.$course->name."\n";
    echo 'Lessons count: '.$course->lessons->count()."\n";
    echo 'Cached lessons_count: '.$course->lessons_count."\n";

} catch (Exception $e) {
    echo '❌ ERROR: '.$e->getMessage()."\n";
}

echo "Test completed!\n";

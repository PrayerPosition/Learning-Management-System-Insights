<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Lesson;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'duration_hours',
        'difficulty',
        'lessons_count',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    protected static function booted()
    {
        static::saved(function ($course) {
            $course->updateQuietly(['lessons_count' => $course->lessons()->count()]);
        });
    }
}

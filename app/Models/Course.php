<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model 
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration_hours',
        'difficulty',
        'lessons_count',
    ];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    protected static function booted(): void
    {
        static::saved(function ($course) {
            $course->updateQuietly(['lessons_count' => $course->lessons()->count()]);
        });
    }
}

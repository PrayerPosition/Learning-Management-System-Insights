<?php

namespace App\Enums;
use Filament\Tables\Enums\EnumColumn;
use Filament\Forms\Components\Select;

enum CourseDifficulty: string
{
    case Easy = 'easy';
    case Intermediate = 'intermediate';
    case Hard = 'hard';

    public function label(): string
    {
        return match($this) {
            self::Easy => __('badge.difficulty.easy'),
            self::Intermediate => __('badge.difficulty.intermediate'),
            self::Hard => __('badge.difficulty.hard'),
        };
    }

    public function color(): string
    {
        return match($this) {
            self::Easy => 'success',
            self::Intermediate => 'warning',
            self::Hard => 'danger',
        };
    }

    
    public function icon(): ?string
    {
        return match($this) {
            self::Easy => 'heroicon-o-smile',
            self::Intermediate => 'heroicon-o-meh',
            self::Hard => 'heroicon-o-frown',
        };
    }
    
}

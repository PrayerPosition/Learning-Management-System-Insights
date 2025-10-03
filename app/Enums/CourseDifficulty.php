<?php

namespace App\Enums;
use Filament\Tables\Enums\EnumColumn;
use Filament\Forms\Components\Select;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

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

    public function getIcon(): ?string
    {
        return match($this) {
            self::Easy => 'heroicon-c-fire',
            self::Intermediate => 'heroicon-c-fire',
            self::Hard => 'heroicon-c-fire',
        };
    }   
    
    
}

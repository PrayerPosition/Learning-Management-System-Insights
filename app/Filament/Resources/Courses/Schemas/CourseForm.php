<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Select;


class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextArea::make('description')->rows(4),
                TextInput::make('duration_hours')->numeric()->minValue(1),
                Select::make('difficulty')->options([
                    'easy' => 'Easy',
                    'intermediate' => 'Intermediate',
                    'hard' => 'Hard',
                ])->required(),
                TextInput::make('lessons_count')->disabled()->numeric(),
            ]);
    }
}

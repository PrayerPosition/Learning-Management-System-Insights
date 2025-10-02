<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Card::make()->schema([
                    TextInput::make('name')->required()->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', \Str::slug($state))),
                    

            ]);
    }
}

<?php

namespace App\Filament\Resources\BookCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class BookCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }
}

<?php

namespace App\Filament\Resources\BookCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class BookCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
            ]);
    }
}

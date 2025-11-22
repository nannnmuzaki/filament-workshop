<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
            FileUpload::make('avatar_path')
                ->label('Author Avatar')
                ->image()
                ->disk('public')
                ->directory('author-avatars')
                ->required()
                ->maxSize(2048),
            TextInput::make('name')
                ->label('Title')
                ->required()
                ->maxLength(255),
            ]);
    }
}

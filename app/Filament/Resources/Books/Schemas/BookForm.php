<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                FileUpload::make('cover_path')
                    ->label('Book Cover')
                    ->image()
                    ->disk('public')
                    ->directory('book-covers')
                    ->required()
                    ->maxSize(2048),
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),
                Select::make('book_category_id')
                    ->label('Book Category')
                    ->relationship('bookCategory', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ]),
                TextInput::make('author')
                    ->label('Author')
                    ->required()
                    ->maxLength(255),
                TextInput::make('year')
                    ->label('Publication Year')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(date('Y'))
                    ->maxLength(4)
                    ->placeholder('e.g., 2025'),
                TextInput::make('stock')
                    ->label('Stock Quantity')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(1)
                    ->helperText('Number of copies available'),
                RichEditor::make('synopsis')
                    ->label('Synopsis')
                    ->required()
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'h2', 'h3',
                        'blockquote', 'codeBlock',
                        'bulletList', 'orderedList',
                        'link',
                        'undo', 'redo',
                    ])
                    ->columnSpanFull(),
                TextInput::make('pdf_path')
                    ->label('PDF Link')
                    ->url()
                    ->required()
                    ->maxLength(255),
            ]);
    }
}

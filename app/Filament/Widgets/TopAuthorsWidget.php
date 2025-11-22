<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class TopAuthorsWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Author::query()
                    ->withCount('books')
                    ->whereHas('books')
                    ->orderBy('books_count', 'desc')
                    ->limit(10)
            )
            ->columns([
                ImageColumn::make('avatar_path')
                    ->label('Avatar')
                    ->disk('public')
                    ->circular()
                    ->size(40),
                TextColumn::make('name')
                    ->label('Author')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('books_count')
                    ->label('Number of Books')
                    ->badge()
                    ->color('success')
                    ->sortable(),
            ])
            ->heading('Top Authors')
            ->description('Authors with the most books in the library')
            ->paginated(false)
            ->groupedBulkActions([]);
    }
}

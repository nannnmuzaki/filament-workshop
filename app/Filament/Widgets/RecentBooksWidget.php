<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentBooksWidget extends BaseWidget
{
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Book::query()
                    ->with('bookCategory')
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                ImageColumn::make('cover_path')
                    ->label('Cover')
                    ->disk('public')
                    ->square()
                    ->size(40),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(30),
                TextColumn::make('author.name')
                    ->searchable()
                    ->sortable()
                    ->limit(25),
                TextColumn::make('bookCategory.name')
                    ->label('Category')
                    ->badge()
                    ->color('info'),
                TextColumn::make('created_at')
                    ->label('Added')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->heading('Recently Added Books')
            ->description('Latest books added to the library')
            ->paginated(false);
    }
}

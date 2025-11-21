<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopAuthorsWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $topAuthors = Book::select('author')
            ->groupBy('author')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(10)
            ->pluck('author');

        return $table
            ->query(
                Book::query()
                    ->whereIn('author', $topAuthors)
                    ->orderBy('author')
            )
            ->columns([
                Tables\Columns\TextColumn::make('author')
                    ->label('Author')
                    ->icon('heroicon-m-user')
                    ->weight('bold')
                    ->formatStateUsing(fn ($state, $record) => $state),
                Tables\Columns\TextColumn::make('books_count')
                    ->label('Number of Books')
                    ->badge()
                    ->color('success')
                    ->state(fn ($record) => Book::where('author', $record->author)->count()),
            ])
            ->heading('Top Authors')
            ->description('Authors with the most books in the library')
            ->paginated(false)
            ->groupedBulkActions([]);
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\BookCategory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BooksOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalBooks = Book::count();
        $booksThisMonth = Book::whereMonth('created_at', now()->month)->count();
        $booksLastMonth = Book::whereMonth('created_at', now()->subMonth()->month)->count();

        $percentageChange = $booksLastMonth > 0
            ? (($booksThisMonth - $booksLastMonth) / $booksLastMonth) * 100
            : 100;

        return [
            Stat::make('Total Categories', BookCategory::count())
                ->description('Book categories')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('info'),
            Stat::make('Total Books', $totalBooks)
                ->description('All books in library')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            Stat::make('Books This Month', $booksThisMonth)
                ->description(($percentageChange >= 0 ? '+' : '') . number_format($percentageChange, 1) . '% from last month')
                ->descriptionIcon($percentageChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($percentageChange >= 0 ? 'success' : 'danger'),
        ];
    }
}

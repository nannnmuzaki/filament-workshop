<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BooksOverviewWidget;
use App\Filament\Widgets\BooksByCategoryChart;
use App\Filament\Widgets\BooksAddedChart;
use App\Filament\Widgets\TopAuthorsWidget;
use App\Filament\Widgets\RecentBooksWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;
use BackedEnum;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    public function getWidgets(): array
    {
        return [
            BooksOverviewWidget::class,
            BooksByCategoryChart::class,
            BooksAddedChart::class,
            TopAuthorsWidget::class,
            RecentBooksWidget::class,
        ];
    }

    public function getColumns(): int | array
    {
        return [
            'md' => 2,
            'xl' => 3,
        ];
    }
}

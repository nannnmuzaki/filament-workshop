<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BooksByCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Books by Category';
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Book::select('book_categories.name', DB::raw('count(*) as total'))
            ->join('book_categories', 'books.book_category_id', '=', 'book_categories.id')
            ->groupBy('book_categories.name', 'book_categories.id')
            ->orderBy('total', 'desc')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Books per Category',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',
                        'rgb(99, 102, 241)',
                        'rgb(168, 85, 247)',
                        'rgb(236, 72, 153)',
                        'rgb(239, 68, 68)',
                        'rgb(249, 115, 22)',
                        'rgb(234, 179, 8)',
                        'rgb(34, 197, 94)',
                    ],
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

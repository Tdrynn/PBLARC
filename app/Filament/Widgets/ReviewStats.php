<?php

namespace App\Filament\Widgets;

use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class ReviewStats extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 4;

    protected function getStats(): array
    {
        $filter = $this->filters['period'] ?? '1_week';
        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };
        $query = Review::whereDate('created_at', '>=', $startDate);
        // Query dengan Filter
        $totalReview = Review::whereDate('created_at', '>=', $startDate)->count();
        $avgRating   = Review::whereDate('created_at', '>=', $startDate)->avg('rating');
        $positiveReview = (clone $query)->where('rating', '>=', 4)->count();

        return [
            Stat::make('Total Reviews', $totalReview)
                ->description('Selected Period')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('info'),

            Stat::make('Average Rating', number_format($avgRating, 1))
                ->icon('heroicon-o-star')
                ->color('warning'),

            Stat::make('Positif Review', $positiveReview)
                ->description('Rating ≥ 4')
                ->icon('heroicon-o-hand-thumb-up')
                ->color('success'),
        ];
    }
}

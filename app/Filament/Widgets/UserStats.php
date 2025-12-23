<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserStats extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 5;

    protected function getStats(): array
    {
        $filter = $this->filters['period'] ?? '1_week';
        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };

        return [
            Stat::make('Total New User', User::whereDate('created_at', '>=', $startDate)->count())
                ->description('Selected Period')
                ->icon('heroicon-o-users'),

            Stat::make('New User Today', User::whereDate('created_at', today())->count())
                ->color('success')
                ->icon('heroicon-o-user-plus'),
            Stat::make(
                'User With Review',
                Review::whereDate('created_at', '>=', $startDate)
                    ->whereNotNull('user_id')
                    ->distinct('user_id')
                    ->count('user_id')
            )
                ->icon('heroicon-o-chat-bubble-oval-left')
                ->color('info'),
        ];
    }
}

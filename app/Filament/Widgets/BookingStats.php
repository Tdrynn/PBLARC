<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class BookingStats extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 3; // Di bawah Chart

    protected function getStats(): array
    {
        // Logika Filter
        $filter = $this->filters['period'] ?? '1_week';
        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };

        return [
            // Angka ini berubah sesuai filter
            Stat::make('Booking (This Period)', Booking::whereDate('created_at', '>=', $startDate)->count())
                ->description('Selected Period')
                ->icon('heroicon-o-calendar-days'),
            Stat::make(
                'Booking Confirmed',
                Booking::whereDate('created_at', '>=', $startDate)
                    ->whereIn('status', ['confirmed', 'paid'])
                    ->count()
            )
                ->description('Ready to be processed')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
            // Angka ini statis (selalu hari ini)
            Stat::make('Book Today', Booking::whereDate('created_at', today())->count())
                ->description('Realtime')
                ->color('success')
                ->icon('heroicon-o-clock'),
        ];
    }
}

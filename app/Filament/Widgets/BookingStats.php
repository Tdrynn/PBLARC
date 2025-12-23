<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BookingStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Booking', Booking::count())
                ->icon('heroicon-o-calendar-days'),

            Stat::make(
                'Booking Hari Ini',
                Booking::whereDate('created_at', today())->count()
            )->icon('heroicon-o-clock'),

        ];
    }
}

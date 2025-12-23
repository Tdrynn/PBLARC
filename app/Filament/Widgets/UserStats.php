<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->icon('heroicon-o-users'),

            Stat::make(
                'User Baru Hari Ini',
                User::whereDate('created_at', today())->count()
            )->icon('heroicon-o-user-plus'),
        ];
    }
}

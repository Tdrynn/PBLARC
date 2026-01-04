<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Carbon\Carbon;

class UserChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'New User';
    protected static ?int $sort = 2; // Urutan ke-2 (Sebelah Booking)
    protected int | string | array $columnSpan = 1; // Set setengah layar

    protected function getData(): array
    {
        $filter = $this->filters['period'] ?? '1_week';

        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };

        // Query Data User
        $data = User::whereDate('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        return [
            'datasets' => [
                [
                    'label' => 'New User',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys()->map(fn($date) => Carbon::parse($date)->format('d M')),
        ];
    }


    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                        'stepSize'  => 1,
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

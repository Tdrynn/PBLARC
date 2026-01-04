<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Booking;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Carbon\Carbon;

class BookingChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Booking';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $filter = $this->filters['period'] ?? '1_week';

        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };

        $packages = [
            1 => ['label' => 'Picnic',      'color' => '#FACC15'],
            2 => ['label' => 'Camping',     'color' => '#22C55E'],
            3 => ['label' => 'Campervan',   'color' => '#3B82F6'],
            4 => ['label' => 'Group Event', 'color' => '#A855F7'],
        ];

        $dates = Booking::whereDate('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('date');

        $datasets = [];

        foreach ($packages as $packageId => $package) {
            $data = Booking::where('package_id', $packageId)
                ->whereDate('created_at', '>=', $startDate)
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->pluck('total', 'date');

            $datasets[] = [
                'label' => $package['label'],
                'data'  => $dates->map(fn($date) => $data[$date] ?? 0),
                'backgroundColor' => $package['color'],
                'borderColor'     => $package['color'],
                'borderWidth'     => 1,
            ];
        }

        return [
            'datasets' => $datasets,
            'labels'   => $dates->map(fn($date) => Carbon::parse($date)->format('d M')),
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
        return 'bar';
    }
}

<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Booking;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Carbon\Carbon;

class BookingChart extends ChartWidget
{
    use InteractsWithPageFilters; // Wajib ada agar connect ke Dashboard

    protected static ?string $heading = 'Booking';
    protected static ?int $sort = 1; // Urutan ke-1

    // Set '1' agar hanya memakan setengah layar (jika layar besar)
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        // 1. Ambil nilai filter dari Dashboard
        $filter = $this->filters['period'] ?? '1_week';

        // 2. Tentukan tanggal mulai berdasarkan filter
        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };

        $packages = [
            1 => 'Picnic',
            2 => 'Camping',
            3 => 'Campervan',
            4 => 'Group Event',
        ];

        // 3. Query tanggal yang ada datanya
        $dates = Booking::whereDate('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('date');

        $datasets = [];

        foreach ($packages as $packageId => $label) {
            $data = Booking::where('package_id', $packageId)
                ->whereDate('created_at', '>=', $startDate)
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->pluck('total', 'date');

            $datasets[] = [
                'label' => $label,
                'data' => $dates->map(fn($date) => $data[$date] ?? 0),
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $dates->map(fn($date) => Carbon::parse($date)->format('d M')),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

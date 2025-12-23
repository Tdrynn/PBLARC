<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Booking;

class BookingChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $packages = [
            1 => 'Picnic',
            2 => 'Camping',
            3 => 'Campervan',
            4 => 'Group Event',
        ];

        // Ambil daftar tanggal (7 hari terakhir)
        $dates = Booking::whereDate('created_at', '>=', now()->subDays(6))
            ->selectRaw('DATE(created_at) as date')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('date');

        $datasets = [];

        foreach ($packages as $packageId => $label) {
            $data = Booking::where('package_id', $packageId)
                ->whereDate('created_at', '>=', now()->subDays(6))
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->pluck('total', 'date');

            // Isi 0 kalau di tanggal tertentu tidak ada booking
            $datasets[] = [
                'label' => $label,
                'data' => $dates->map(fn($date) => $data[$date] ?? 0),
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $dates,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\User;
use App\Models\Review;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;
    public function getColumns(): int | string | array
    {
        return 2;
    }

    protected static ?string $title = 'Dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->schema([
                    Select::make('period')
                        ->label('Filter Periode')
                        ->options([
                            '1_week'  => '1 Minggu Terakhir',
                            '1_month' => '1 Bulan Terakhir',
                            '1_year'  => '1 Tahun Terakhir',
                        ])
                        ->default('1_week')
                        ->live()
                        ->selectablePlaceholder(false),
                ])
                ->columns(3),
        ]);
    }
    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadPdf')
                ->label('Download Rekap PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('danger')
                ->action(fn() => $this->downloadDashboardPdf()),
        ];
    }
    protected function downloadDashboardPdf()
    {
        $filter = $this->filters['period'] ?? '1_week';

        $startDate = match ($filter) {
            '1_month' => now()->subMonth(),
            '1_year'  => now()->subYear(),
            default   => now()->subWeek(),
        };
        $totalBooking = Booking::whereDate('created_at', '>=', $startDate)->count();
        $todayBooking = Booking::whereDate('created_at', today())->count();
        $bookingConfirmed = Booking::whereDate('created_at', '>=', $startDate)
            ->whereIn('status', ['confirmed', 'paid'])
            ->count();

        $totalReview = Review::whereDate('created_at', '>=', $startDate)->count();
        $avgRating   = Review::whereDate('created_at', '>=', $startDate)->avg('rating');
        $positiveReview = Review::whereDate('created_at', '>=', $startDate)
            ->where('rating', '>=', 4)
            ->count();

        $totalUser   = User::whereDate('created_at', '>=', $startDate)->count();
        $newUserToday = User::whereDate('created_at', today())->count();
        $userWithReview = Review::whereDate('created_at', '>=', $startDate)
            ->whereNotNull('user_id')
            ->distinct('user_id')
            ->count('user_id');


        $periodeLabel = match ($filter) {
            '1_month' => '1 Bulan Terakhir',
            '1_year'  => '1 Tahun Terakhir',
            default   => '1 Minggu Terakhir',
        };
        $pdf = Pdf::loadView('pdf.rekap-dashboard', [
            'totalBooking' => $totalBooking,
            'todayBooking' => $todayBooking,
            'bookingConfirmed'  => $bookingConfirmed,
            'totalReview'  => $totalReview,
            'avgRating'    => number_format($avgRating, 1),
            'positiveReview'    => $positiveReview,
            'userWithReview'    => $userWithReview,
            'totalUser'    => $totalUser,
            'newUserToday' => $newUserToday,
            'periode'      => $periodeLabel,
            'tanggal'      => now()->format('d F Y'),
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'rekap-dashboard-' . now()->format('d-m-Y') . '.pdf'
        );
    }
}

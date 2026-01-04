<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Filament\Resources\BookingResource\RelationManagers\AddonsRelationManager;
use App\Filament\Resources\BookingResource\RelationManagers\DetailsRelationManager;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Select::make('package_id')
                //     ->relationship('package', 'name')
                //     ->required(),

                // TextInput::make('name')->required(),
                // TextInput::make('telephone'),
                // TextInput::make('email')->email(),
                // DatePicker::make('checkin'),
                // DatePicker::make('checkout'),
                // TextInput::make('participants')->numeric(),
                // TextInput::make('total_price')->numeric(),
                // Select::make('status')->options([
                //     'pending' => 'Pending',
                //     'paid' => 'Paid',
                //     'cancelled' => 'Cancelled',
                // ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Customer')
                    ->searchable(),

                TextColumn::make('package.name')
                    ->label('Package'),

                TextColumn::make('checkin')
                    ->date(),

                TextColumn::make('checkout')
                    ->date(),

                TextColumn::make('participants'),

                TextColumn::make('total_price')
                    ->money('IDR'),

                TextColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'paid',
                        'danger'  => 'cancelled',
                    ]),
            ])
            ->headerActions([
                Action::make('downloadPdf')
                    ->label('Download Rekap PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->action(function () {

                        $bookings = Booking::with('package')->get();

                        $pdf = Pdf::loadView('pdf.rekap-booking', [
                            'bookings'      => $bookings,
                            'totalBooking' => $bookings->count(),
                            'totalHarga'   => $bookings->sum('total_price'),
                        ]);

                        return response()->streamDownload(
                            fn() => print($pdf->output()),
                            'rekap-booking-' . now()->format('d-m-Y') . '.pdf'
                        );
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AddonsRelationManager::class,
            DetailsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}

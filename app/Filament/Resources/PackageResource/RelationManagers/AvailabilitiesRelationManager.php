<?php

namespace App\Filament\Resources\PackageResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class AvailabilitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'availabilities';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // DatePicker::make('date')
                //     ->required()
                //     ->maxLength(255),
                // TextInput::make('capacity')->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date')
            ->columns([
                TextColumn::make('date')->date(),
                TextColumn::make('capacity'),
            ])
            ->filters([
                Filter::make('date')
                    ->form([
                        DatePicker::make('date')
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['date']) {
                            $query->whereDate('date', $data['date']);
                        }
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

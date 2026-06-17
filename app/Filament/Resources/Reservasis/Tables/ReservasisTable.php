<?php

namespace App\Filament\Resources\Reservasis\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ReservasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.nama')
                    ->label('Pelanggan')
                    ->searchable(),

                TextColumn::make('kapster.nama')
                    ->label('Kapster')
                    ->searchable(),

                TextColumn::make('layanan.nama_layanan')
                    ->label('Layanan Terpilih')
                    ->badge()
                    ->color('info'),

                TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Tanggal'),

                TextColumn::make('slot_waktu')
                    ->time('H:i')
                    ->label('Jam'),

                TextColumn::make('metode_pembayaran')
                    ->label('Metode'),

                TextColumn::make('status_pembayaran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Lunas' => 'success',
                        'Pending' => 'warning',
                        'Batal' => 'danger',
                        default => 'secondary',
                    })
                    ->label('Status'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
                    ->visible(fn () => auth()->user()->hasRole('Super Admin')),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()->hasRole('Super Admin')),
                ]),
            ]);
    }
}
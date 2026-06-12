<?php

namespace App\Filament\Resources\Reservasis;

use App\Filament\Resources\Reservasis\Pages\CreateReservasi;
use App\Filament\Resources\Reservasis\Pages\EditReservasi;
use App\Filament\Resources\Reservasis\Pages\ListReservasis;
use App\Filament\Resources\Reservasis\Schemas\ReservasiForm;
use App\Filament\Resources\Reservasis\Tables\ReservasisTable;
use App\Models\Reservasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // UBAH DI SINI: dari 'nama' menjadi 'slot_waktu' karena tabel reservasi tidak memiliki kolom nama
    protected static ?string $recordTitleAttribute = 'slot_waktu';

    // --- TEMBOK ANTI-HAPUS UNTUK KASIR ---
    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->user()->hasRole('Super Admin');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()->hasRole('Super Admin');
    }
    // -------------------------------------

    public static function form(Schema $schema): Schema
    {
        return ReservasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReservasis::route('/'),
            'create' => CreateReservasi::route('/create'),
            'edit' => EditReservasi::route('/{record}/edit'),
        ];
    }
}
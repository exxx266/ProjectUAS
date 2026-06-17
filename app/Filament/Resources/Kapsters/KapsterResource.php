<?php

namespace App\Filament\Resources\Kapsters;

use App\Filament\Resources\Kapsters\Pages\CreateKapster;
use App\Filament\Resources\Kapsters\Pages\EditKapster;
use App\Filament\Resources\Kapsters\Pages\ListKapsters;
use App\Filament\Resources\Kapsters\Schemas\KapsterForm;
use App\Filament\Resources\Kapsters\Tables\KapstersTable;
use App\Models\Kapster;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KapsterResource extends Resource
{
    protected static ?string $model = Kapster::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Super Admin');
    }

    public static function form(Schema $schema): Schema
    {
        return KapsterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KapstersTable::configure($table);
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
            'index' => ListKapsters::route('/'),
            'create' => CreateKapster::route('/create'),
            'edit' => EditKapster::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
    return auth()->user()->hasRole('Super Admin');
    }
}


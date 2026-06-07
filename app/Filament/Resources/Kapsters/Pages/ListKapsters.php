<?php

namespace App\Filament\Resources\Kapsters\Pages;

use App\Filament\Resources\Kapsters\KapsterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKapsters extends ListRecords
{
    protected static string $resource = KapsterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

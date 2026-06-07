<?php

namespace App\Filament\Resources\Kapsters\Pages;

use App\Filament\Resources\Kapsters\KapsterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKapster extends EditRecord
{
    protected static string $resource = KapsterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\Reservasis\Pages;

use App\Filament\Resources\Reservasis\ReservasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReservasi extends CreateRecord
{
    protected static string $resource = ReservasiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->layanan as $layanan) {
            $this->record->layanan()->updateExistingPivot($layanan->id, [
                'harga_saat_ini' => $layanan->harga,
            ]);
        }
    }
}
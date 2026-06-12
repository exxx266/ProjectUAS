<?php

namespace App\Filament\Resources\Reservasis\Pages;

use App\Filament\Resources\Reservasis\ReservasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReservasi extends EditRecord
{
    protected static string $resource = ReservasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->visible(fn () => auth()->user()->hasRole('Super Admin')),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
    protected function afterSave(): void
    {
        foreach ($this->record->layanan as $layanan) {
            $this->record->layanan()->updateExistingPivot($layanan->id, [
                'harga_saat_ini' => $layanan->harga,
            ]);
        }
    }
}
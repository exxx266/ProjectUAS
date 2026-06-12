<?php

namespace App\Filament\Resources\Reservasis\Pages;

use App\Filament\Resources\Reservasis\ReservasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReservasi extends CreateRecord
{
    protected static string $resource = ReservasiResource::class;

    // Kode 1: Otomatis balik ke tabel setelah sukses membuat data
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // Kode 2: Otomatis mengambil harga asli dari layanan dan menyimpannya ke nota
    protected function afterCreate(): void
    {
        foreach ($this->record->layanan as $layanan) {
            $this->record->layanan()->updateExistingPivot($layanan->id, [
                'harga_saat_ini' => $layanan->harga,
            ]);
        }
    }
}
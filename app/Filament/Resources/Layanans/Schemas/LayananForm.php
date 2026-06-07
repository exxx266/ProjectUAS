<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_layanan')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                
                // Komponen Upload Foto untuk Layanan
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('foto-layanan')
                    ->columnSpanFull(),
            ]);
    }
}
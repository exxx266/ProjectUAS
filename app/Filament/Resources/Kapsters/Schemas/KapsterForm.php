<?php

namespace App\Filament\Resources\Kapsters\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class KapsterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('keahlian')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                
                // Ini dia komponen ajaib untuk Upload Foto
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('foto-kapster')
                    ->columnSpanFull(),
            ]);
    }
}
<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->placeholder('contoh: Botani & Konservasi')
                            ->required(),
                        Textarea::make('description')
                            ->label('Deskripsi Kategori')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

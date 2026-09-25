<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('title')
                    ->label('Nama Kamar')
                    ->columnSpanFull()
                    ->required(),
                Select::make('category_id')
                    ->label('Tipe Kamar')
                    ->relationship('category', 'name')
                    ->required(),
                RichEditor::make('content')
                    ->label('Detail Kamar')
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'min-height: 250px;',
                    ]),
            ]);
    }
}

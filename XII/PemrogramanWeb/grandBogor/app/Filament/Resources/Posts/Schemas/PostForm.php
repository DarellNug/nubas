<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi & Gambar Artikel')
                    ->description('Kelola judul, kategori, dan foto utama artikel publikasi resort')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto Utama (Thumbnail)')
                            ->image()
                            ->disk('public')
                            ->directory('posts')
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('title')
                            ->label('Judul Artikel')
                            ->placeholder('contoh: Pesona Kebun Botani 12 Hektar Grand Bogor')
                            ->required()
                            ->columnSpan(2),
                        Select::make('category_id')
                            ->label('Kategori Artikel')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Section::make('Konten Artikel')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Artikel & Narasi')
                            ->required()
                            ->columnSpanFull()
                            ->extraAttributes([
                                'style' => 'min-height: 320px;',
                            ]),
                    ]),
            ]);
    }
}

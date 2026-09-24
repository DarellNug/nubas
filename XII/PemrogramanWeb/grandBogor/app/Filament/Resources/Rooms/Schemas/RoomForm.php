<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama Unit Kamar & Suite')
                    ->description('Detail identitas, klasifikasi tipe kamar, serta kode sayap hunian')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Foto Kamar')
                            ->disk('public')
                            ->directory('rooms')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),
                        TextInput::make('name')
                            ->label('Nama Kamar & Suite')
                            ->placeholder('contoh: Deluxe Forest View')
                            ->required(),
                        Select::make('room_category_id')
                            ->label('Kategori Kamar')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('code')
                            ->label('Kode Unit Kamar')
                            ->placeholder('contoh: DF-102')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('location')
                            ->label('Lokasi Lantai & Sayap')
                            ->placeholder('contoh: Lt. 1 Sayap Pinus')
                            ->required(),
                        Select::make('status')
                            ->label('Status Ketersediaan')
                            ->options([
                                'tersedia' => 'Tersedia',
                                'terisi_in_house' => 'Terisi (In-House)',
                                'terisi_checkout_besok' => 'Terisi (Checkout Besok)',
                                'maintenance' => 'Maintenance',
                            ])
                            ->required()
                            ->default('tersedia'),
                        Toggle::make('is_active')
                            ->label('Aktifkan di Sistem')
                            ->default(true),
                    ])
                    ->columns(2),

                Section::make('Kapasitas & Ketentuan Tarif')
                    ->description('Spesifikasi daya tampung tamu dan harga per malam')
                    ->schema([
                        TextInput::make('capacity_adults')
                            ->label('Kapasitas Dewasa')
                            ->numeric()
                            ->default(2)
                            ->minValue(1)
                            ->required(),
                        TextInput::make('capacity_children')
                            ->label('Kapasitas Anak')
                            ->numeric()
                            ->default(0),
                        TextInput::make('price_per_night')
                            ->label('Tarif per Malam (IDR)')
                            ->prefix('Rp')
                            ->numeric()
                            ->required(),
                        TextInput::make('price_note')
                            ->label('Catatan Paket / Inklusi')
                            ->placeholder('contoh: Termasuk Breakfast, Executive Lounge Access'),
                        TextInput::make('area_sqm')
                            ->label('Luas Ruangan (m²)')
                            ->suffix('m²')
                            ->numeric(),
                    ])
                    ->columns(2),

                Section::make('Fasilitas Unggulan & Deskripsi')
                    ->description('Fitur mewah dan narasi kenyamanan unit')
                    ->schema([
                        TagsInput::make('facilities')
                            ->label('Fasilitas Utama')
                            ->suggestions([
                                'WiFi',
                                'Forest Balcony',
                                'Bathtub',
                                'King Size',
                                'Espresso Bar',
                                'Jacuzzi',
                                'Private Pool',
                                'Pine Sundeck',
                                '24h Butler',
                                'Garden Patio',
                                'Rain Shower',
                                'Smart TV 55"',
                                'Kitchenette',
                                '2 Bedroom',
                                'Minibar',
                            ])
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Deskripsi Lengkap Unit')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

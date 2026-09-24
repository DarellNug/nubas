<?php

namespace App\Filament\Resources\Rooms\Tables;

use App\Models\Room;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class RoomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('THUMBNAIL')
                    ->disk('public')
                    ->defaultImageUrl(fn () => asset('storage/rooms/deluxe_forest_view.jpg'))
                    ->extraImgAttributes([
                        'class' => 'rounded-lg object-cover shadow-sm',
                        'style' => 'width: 58px; height: 46px; border-radius: 6px;',
                    ]),

                TextColumn::make('name')
                    ->label('DETAIL KAMAR & KODE')
                    ->weight('bold')
                    ->description(fn (Room $record): string => "KODE: {$record->code} • {$record->location}")
                    ->searchable(['name', 'code', 'location']),

                TextColumn::make('capacity_display')
                    ->label('KAPASITAS')
                    ->icon('heroicon-o-user-group')
                    ->state(fn (Room $record): string => "{$record->capacity_adults} Dewasa" . ($record->capacity_children > 0 ? " + {$record->capacity_children} Anak" : ''))
                    ->color('gray'),

                TextColumn::make('price_per_night')
                    ->label('TARIF / MALAM')
                    ->weight('bold')
                    ->state(fn (Room $record): string => 'Rp ' . number_format($record->price_per_night, 0, ',', '.'))
                    ->description(fn (Room $record): ?string => $record->price_note)
                    ->sortable(),

                TextColumn::make('facilities')
                    ->label('FASILITAS UTAMA')
                    ->badge()
                    ->color('gray')
                    ->separator(','),

                TextColumn::make('status')
                    ->label('STATUS')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'tersedia' => 'Tersedia',
                        'terisi_in_house' => 'Terisi (In-House)',
                        'terisi_checkout_besok' => 'Terisi (Checkout Besok)',
                        'maintenance' => 'Maintenance',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'tersedia' => 'success',
                        'terisi_in_house', 'terisi_checkout_besok' => 'gray',
                        'maintenance' => 'warning',
                        default => 'primary',
                    }),
            ])
            ->filters([
                SelectFilter::make('room_category_id')
                    ->label('Semua Kategori')
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                ViewAction::make()->iconButton(),
                EditAction::make()->iconButton(),
                DeleteAction::make()->iconButton(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(5)
            ->paginationPageOptions([5, 10, 25, 50]);
    }
}

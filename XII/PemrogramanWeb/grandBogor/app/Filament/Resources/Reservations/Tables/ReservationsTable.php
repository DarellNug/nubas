<?php

namespace App\Filament\Resources\Reservations\Tables;

use App\Models\Reservation;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reservation_code')
                    ->label('KODE BOOKING')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('guest_name')
                    ->label('DATA TAMU')
                    ->weight('bold')
                    ->description(fn (Reservation $record): string => "{$record->guest_phone} • {$record->guest_email}")
                    ->searchable(),

                TextColumn::make('room.name')
                    ->label('KAMAR & SAYAP')
                    ->description(fn (Reservation $record): string => $record->room ? "Unit: {$record->room->code} ({$record->room->location})" : '-')
                    ->searchable(),

                TextColumn::make('period')
                    ->label('PERIODE MENGINAP')
                    ->state(fn (Reservation $record): string => $record->check_in_date->format('d M Y') . ' - ' . $record->check_out_date->format('d M Y'))
                    ->description(fn (Reservation $record): string => "{$record->total_nights} Malam • {$record->total_adults} Dewasa" . ($record->total_children > 0 ? ", {$record->total_children} Anak" : ''))
                    ->sortable(['check_in_date']),

                TextColumn::make('total_amount')
                    ->label('TOTAL TARIF')
                    ->weight('bold')
                    ->state(fn (Reservation $record): string => 'Rp ' . number_format($record->total_amount, 0, ',', '.'))
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->label('PEMBAYARAN')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'paid' => 'Lunas',
                        'pending' => 'Menunggu Pembayaran',
                        'refunded' => 'Dikembalikan',
                        'cancelled' => 'Dibatalkan',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'refunded', 'cancelled' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('reservation_status')
                    ->label('STATUS')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'confirmed' => 'Dikonfirmasi',
                        'checked_in' => 'Checked In',
                        'checked_out' => 'Checked Out',
                        'pending' => 'Pending',
                        'cancelled' => 'Dibatalkan',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'info',
                        'checked_in' => 'success',
                        'checked_out' => 'gray',
                        'pending' => 'warning',
                        'cancelled' => 'danger',
                        default => 'primary',
                    }),
            ])
            ->filters([
                SelectFilter::make('reservation_status')
                    ->label('Status Reservasi')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Dikonfirmasi',
                        'checked_in' => 'Checked In',
                        'checked_out' => 'Checked Out',
                        'cancelled' => 'Dibatalkan',
                    ]),
                SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'pending' => 'Menunggu Pembayaran',
                        'paid' => 'Lunas',
                        'refunded' => 'Dikembalikan',
                        'cancelled' => 'Dibatalkan',
                    ]),
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
            ]);
    }
}

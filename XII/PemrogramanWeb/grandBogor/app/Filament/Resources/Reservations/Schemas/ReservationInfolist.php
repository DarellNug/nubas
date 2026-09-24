<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReservationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('reservation_code'),
                TextEntry::make('room.name')
                    ->label('Room'),
                TextEntry::make('guest_name'),
                TextEntry::make('guest_email'),
                TextEntry::make('guest_phone'),
                TextEntry::make('id_type'),
                TextEntry::make('check_in_date')
                    ->date(),
                TextEntry::make('check_out_date')
                    ->date(),
                TextEntry::make('total_nights')
                    ->numeric(),
                TextEntry::make('total_adults')
                    ->numeric(),
                TextEntry::make('total_children')
                    ->numeric(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('payment_status'),
                TextEntry::make('reservation_status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

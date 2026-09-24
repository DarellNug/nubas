<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RoomInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('room_category_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('code'),
                TextEntry::make('location'),
                TextEntry::make('capacity_adults')
                    ->numeric(),
                TextEntry::make('capacity_children')
                    ->numeric(),
                TextEntry::make('price_per_night')
                    ->numeric(),
                TextEntry::make('price_note')
                    ->placeholder('-'),
                TextEntry::make('area_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('thumbnail')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

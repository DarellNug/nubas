<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_code'),
                TextEntry::make('room.name')
                    ->label('Room')
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('inquiry_type'),
                IconEntry::make('is_vip')
                    ->boolean(),
                TextEntry::make('check_in_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('check_out_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('guest_count')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('message')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('status'),
                TextEntry::make('response_time_minutes')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

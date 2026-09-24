<?php

namespace App\Filament\Resources\HousekeepingLogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HousekeepingLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('room_id')
                    ->relationship('room', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                TextInput::make('cleanliness_status')
                    ->required()
                    ->default('higienis_steril'),
                DateTimePicker::make('inspected_at'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}

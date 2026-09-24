<?php

namespace App\Filament\Resources\HousekeepingLogs\Pages;

use App\Filament\Resources\HousekeepingLogs\HousekeepingLogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHousekeepingLogs extends ListRecords
{
    protected static string $resource = HousekeepingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\HousekeepingLogs\Pages;

use App\Filament\Resources\HousekeepingLogs\HousekeepingLogResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHousekeepingLog extends EditRecord
{
    protected static string $resource = HousekeepingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

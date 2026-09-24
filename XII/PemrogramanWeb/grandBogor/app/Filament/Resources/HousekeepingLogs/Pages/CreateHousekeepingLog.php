<?php

namespace App\Filament\Resources\HousekeepingLogs\Pages;

use App\Filament\Resources\HousekeepingLogs\HousekeepingLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHousekeepingLog extends CreateRecord
{
    protected static string $resource = HousekeepingLogResource::class;
}

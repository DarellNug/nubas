<?php

namespace App\Filament\Resources\HousekeepingLogs;

use App\Filament\Resources\HousekeepingLogs\Pages\CreateHousekeepingLog;
use App\Filament\Resources\HousekeepingLogs\Pages\EditHousekeepingLog;
use App\Filament\Resources\HousekeepingLogs\Pages\ListHousekeepingLogs;
use App\Filament\Resources\HousekeepingLogs\Schemas\HousekeepingLogForm;
use App\Filament\Resources\HousekeepingLogs\Tables\HousekeepingLogsTable;
use App\Models\HousekeepingLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HousekeepingLogResource extends Resource
{
    protected static ?string $model = HousekeepingLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $navigationLabel = 'Log Housekeeping';

    protected static ?string $modelLabel = 'Log Housekeeping';

    protected static ?string $pluralModelLabel = 'Inspeksi & Log Housekeeping';

    protected static string|UnitEnum|null $navigationGroup = 'PENGATURAN RESORT';

    protected static ?int $navigationSort = 11;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HousekeepingLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HousekeepingLogsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHousekeepingLogs::route('/'),
            'create' => CreateHousekeepingLog::route('/create'),
            'edit' => EditHousekeepingLog::route('/{record}/edit'),
        ];
    }
}

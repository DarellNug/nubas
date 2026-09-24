<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\OperationsOverview;
use App\Filament\Widgets\StatsOverview;
use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Ringkasan & Metrik';

    protected static string|UnitEnum|null $navigationGroup = 'MANAJEMEN RESORT';

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    public function getTitle(): string | Htmlable
    {
        return 'Ringkasan & Metrik Operasional Resor';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return 'Sistem Manajemen Reservasi & Resepsionis • Grand Bogor Resort & Botanical Sanctuary';
    }

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            OperationsOverview::class,
        ];
    }
}

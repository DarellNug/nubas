<?php

namespace App\Filament\Resources\Rooms\Pages;

use App\Filament\Resources\Rooms\RoomResource;
use App\Filament\Widgets\OperationsOverview;
use App\Filament\Widgets\StatsOverview;
use App\Models\Room;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class ListRooms extends ListRecords
{
    protected static string $resource = RoomResource::class;

    public function getTitle(): string | Htmlable
    {
        return 'Manajemen Inventaris Kamar & Suite';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return 'Kendali penuh atas ketersediaan tipe kamar, penyesuaian tarif dinamis, serta status pemeliharaan sanitasi unit resort.';
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'ADMIN KONSOL UJIKOM • ID Modul: RM-INVENT-2025',
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->action(function () {
                    Notification::make()
                        ->title('Laporan Siap Dicetak')
                        ->body('Data okupansi dan inventaris 48 unit kamar telah digenerate.')
                        ->success()
                        ->send();
                }),
            CreateAction::make()
                ->label('Tambah Kamar Baru')
                ->icon('heroicon-o-plus'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            OperationsOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'semua' => Tab::make('Semua')
                ->badge(Room::count()),
            'tersedia' => Tab::make('Tersedia')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'tersedia'))
                ->badge(Room::where('status', 'tersedia')->count()),
            'terisi' => Tab::make('Terisi')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereIn('status', ['terisi_in_house', 'terisi_checkout_besok']))
                ->badge(Room::whereIn('status', ['terisi_in_house', 'terisi_checkout_besok'])->count()),
            'maintenance' => Tab::make('Maintenance')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'maintenance'))
                ->badge(Room::where('status', 'maintenance')->count()),
        ];
    }
}

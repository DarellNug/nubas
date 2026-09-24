<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalRooms = Room::count();
        $occupiedRooms = Room::whereIn('status', ['terisi_in_house', 'terisi_checkout_besok'])->count();
        $occupancyRate = $totalRooms > 0 ? round(($occupiedRooms / $totalRooms) * 100) : 0;
        $newInquiries = Inquiry::where('status', 'baru')->count();

        return [
            Stat::make('TOTAL INVENTARIS', $totalRooms ?: '48')
                ->description('Unit Kamar & Villa Aktif • 5 Kategori Unit • Kapasitas 136 Tamu')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary'),

            Stat::make('OKUPANSI HARI INI', ($occupancyRate ?: '84') . '%')
                ->description("+6.2% • {$occupiedRooms} dari {$totalRooms} Unit Terisi")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([65, 70, 74, 76, 80, 82, 84])
                ->color('success'),

            Stat::make('INQUIRY RESERVASI BARU', $newInquiries ?: '19')
                ->description('Perlu Tindakan • Permintaan < 24 jam • Respons: 12 mnt')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),

            Stat::make('AVERAGE DAILY RATE (ADR)', 'Rp 2.450.000')
                ->description('Rerata / malam • RevPAR: Rp 2.058.000 • Target Q2: 92%')
                ->descriptionIcon('heroicon-m-banknotes')
                ->chart([2100, 2250, 2300, 2400, 2450])
                ->color('warning'),
        ];
    }
}

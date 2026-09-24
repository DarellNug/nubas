<?php

namespace App\Filament\Resources\Inquiries\Tables;

use App\Models\Inquiry;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('is_vip')
                    ->label('VIP')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->falseIcon('heroicon-o-minus')
                    ->trueColor('warning')
                    ->falseColor('gray')
                    ->sortable(),

                TextColumn::make('inquiry_code')
                    ->label('KODE INKUIRI')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('NAMA / INSTANSI')
                    ->weight('bold')
                    ->description(fn (Inquiry $record): string => "{$record->phone} • {$record->email}")
                    ->searchable(),

                TextColumn::make('inquiry_type')
                    ->label('KATEGORI')
                    ->badge()
                    ->color('info'),

                TextColumn::make('room.name')
                    ->label('UNIT / KEPERLUAN')
                    ->description(fn (Inquiry $record): string => $record->guest_count ? "{$record->guest_count} Tamu/Delegasi" : '-')
                    ->searchable(),

                TextColumn::make('message')
                    ->label('PESAN / PERMINTAAN')
                    ->limit(45)
                    ->tooltip(fn (Inquiry $record): ?string => $record->message),

                TextColumn::make('status')
                    ->label('STATUS')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'baru' => 'Perlu Tindakan',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditutup' => 'Ditutup',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'baru' => 'danger',
                        'diproses' => 'warning',
                        'selesai' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('response_time_minutes')
                    ->label('RESPONS')
                    ->formatStateUsing(fn ($state) => $state ? "{$state} mnt" : '-')
                    ->color('gray')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('is_vip')
                    ->label('Khusus Prioritas VIP')
                    ->query(fn (Builder $query): Builder => $query->where('is_vip', true)),

                SelectFilter::make('status')
                    ->label('Status Penanganan')
                    ->options([
                        'baru' => 'Baru / Perlu Tindakan',
                        'diproses' => 'Sedang Diproses',
                        'selesai' => 'Selesai / Terkonfirmasi',
                        'ditutup' => 'Ditutup',
                    ]),

                SelectFilter::make('inquiry_type')
                    ->label('Kategori Inkuiri')
                    ->options([
                        'Reservasi Kamar' => 'Reservasi Kamar',
                        'MICE / Korporat Gathering' => 'MICE / Korporat Gathering',
                        'VIP / Helipad Charter' => 'VIP / Helipad Charter',
                        'Wedding & Acara' => 'Wedding & Acara',
                        'Lotus Spa & Wellness' => 'Lotus Spa & Wellness',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()->iconButton(),
                EditAction::make()->iconButton(),
                DeleteAction::make()->iconButton(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

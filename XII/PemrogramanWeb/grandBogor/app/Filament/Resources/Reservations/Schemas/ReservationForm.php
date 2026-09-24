<?php

namespace App\Filament\Resources\Reservations\Schemas;

use App\Models\Room;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('1. DATA PERSONAL TAMU')
                    ->description('Identitas resmi tamu sesuai standar regulasi privasi & CHSE')
                    ->schema([
                        TextInput::make('reservation_code')
                            ->label('Kode Reservasi')
                            ->default(fn () => 'GBR-' . now()->format('Ym') . '-' . rand(1000, 9999))
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('id_type')
                            ->label('Tipe Identitas')
                            ->options([
                                'KTP' => 'KTP',
                                'Paspor' => 'Paspor',
                                'SIM' => 'SIM / Lainnya',
                            ])
                            ->default('KTP')
                            ->required(),
                        TextInput::make('guest_name')
                            ->label('Nama Lengkap Tamu')
                            ->placeholder('e.g. Raden Arya Wicaksana')
                            ->required(),
                        TextInput::make('guest_email')
                            ->label('Alamat Email (Untuk Voucher Digital)')
                            ->email()
                            ->placeholder('nama@domain.com')
                            ->required(),
                        TextInput::make('guest_phone')
                            ->label('Nomor WhatsApp / Seluler Aktif')
                            ->placeholder('+62 812 3456 7890')
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('2. PREFERENSI RUANGAN & KEDATANGAN')
                    ->description('Pilihan unit santuari, periode menginap, serta penetapan tarif')
                    ->schema([
                        Select::make('room_id')
                            ->label('Tipe Kamar / Sanctuary Suite')
                            ->relationship('room', 'name')
                            ->getOptionLabelFromRecordUsing(fn (Room $record) => "{$record->name} ({$record->code}) - Rp " . number_format($record->price_per_night, 0, ',', '.') . "/malam")
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('reservation_status')
                            ->label('Status Reservasi')
                            ->options([
                                'pending' => 'Pending',
                                'confirmed' => 'Dikonfirmasi',
                                'checked_in' => 'Checked In',
                                'checked_out' => 'Checked Out',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('confirmed')
                            ->required(),
                        DatePicker::make('check_in_date')
                            ->label('Tanggal Check-In')
                            ->required()
                            ->default(now()),
                        DatePicker::make('check_out_date')
                            ->label('Tanggal Check-Out')
                            ->required()
                            ->default(now()->addDays(1)),
                        TextInput::make('total_nights')
                            ->label('Jumlah Malam')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->required(),
                        TextInput::make('total_adults')
                            ->label('Jumlah Tamu Dewasa')
                            ->numeric()
                            ->default(2)
                            ->minValue(1)
                            ->required(),
                        TextInput::make('total_children')
                            ->label('Jumlah Tamu Anak')
                            ->numeric()
                            ->default(0),
                        TextInput::make('total_amount')
                            ->label('Total Tarif (IDR)')
                            ->prefix('Rp')
                            ->numeric()
                            ->required(),
                        Select::make('payment_status')
                            ->label('Status Pembayaran')
                            ->options([
                                'pending' => 'Menunggu Pembayaran',
                                'paid' => 'Lunas',
                                'refunded' => 'Dikembalikan',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('pending')
                            ->required(),
                    ])
                    ->columns(3),

                Section::make('3. PERMINTAAN KHUSUS & PERSONALISASI LAYANAN')
                    ->description('Layanan kustomisasi untuk menyempurnakan pengalaman menginap')
                    ->schema([
                        CheckboxList::make('special_requests')
                            ->label('Permintaan Tambahan')
                            ->options([
                                'Extra Bed Setup' => 'Extra Bed Setup',
                                'Romantic / Honeymoon' => 'Romantic / Honeymoon',
                                'Baby Cot / Crib' => 'Baby Cot / Crib',
                                'VIP Shuttle / Pick-up' => 'VIP Shuttle / Pick-up',
                                'Early Check-in Priority' => 'Early Check-in Priority',
                                'Diet Halal / Vegan Chef' => 'Diet Halal / Vegan Chef',
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                        Textarea::make('notes')
                            ->label('Pesan Tambahan & Kebutuhan Spesifik (Opsional)')
                            ->placeholder('Ceritakan ekspektasi Anda: contoh penataan bunga mawar di kamar, perayaan hari jadi, alergi kacang/gluten, atau kamar bebas asap rokok...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

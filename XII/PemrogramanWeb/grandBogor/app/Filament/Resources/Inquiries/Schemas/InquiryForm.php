<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use App\Models\Room;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pemohon & Tamu')
                    ->description('Data kontak dan identitas tamu/instansi pemohon')
                    ->schema([
                        TextInput::make('inquiry_code')
                            ->label('Kode Inkuiri')
                            ->default(fn () => 'INQ-' . now()->format('Y') . '-' . rand(100, 999))
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('name')
                            ->label('Nama Lengkap / Instansi')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email Korespondensi')
                            ->email()
                            ->required(),
                        TextInput::make('phone')
                            ->label('No. WhatsApp / Telepon Aktif')
                            ->required(),
                        Toggle::make('is_vip')
                            ->label('Prioritas VIP (VVIP / Corporate / Helipad)')
                            ->default(false),
                    ])
                    ->columns(2),

                Section::make('Preferensi Layanan & Permintaan Resor')
                    ->description('Kebutuhan unit, fasilitas acara, dan estimasi waktu')
                    ->schema([
                        Select::make('inquiry_type')
                            ->label('Kategori Inkuiri')
                            ->options([
                                'Reservasi Kamar' => 'Reservasi Kamar & Suite',
                                'MICE / Korporat Gathering' => 'MICE / Korporat Gathering (Grand Ballroom)',
                                'VIP / Helipad Charter' => 'VIP / Helipad Charter (WRO-GBR)',
                                'Wedding & Acara' => 'Pernikahan & Acara Spesial',
                                'Lotus Spa & Wellness' => 'Lotus Spa & Ritual Relaksasi',
                                'Pertanyaan Umum' => 'Pertanyaan Umum / Concierge',
                            ])
                            ->default('Reservasi Kamar')
                            ->required(),
                        Select::make('room_id')
                            ->label('Pilihan Kamar / Unit (Opsional)')
                            ->relationship('room', 'name')
                            ->getOptionLabelFromRecordUsing(fn (Room $record) => "{$record->name} ({$record->code})")
                            ->searchable()
                            ->preload(),
                        TextInput::make('guest_count')
                            ->label('Estimasi Jumlah Tamu / Delegasi')
                            ->numeric()
                            ->minValue(1),
                        DatePicker::make('check_in_date')
                            ->label('Rencana Kedatangan'),
                        DatePicker::make('check_out_date')
                            ->label('Rencana Kepulangan'),
                        Select::make('status')
                            ->label('Status Penanganan')
                            ->options([
                                'baru' => 'Baru / Perlu Tindakan',
                                'diproses' => 'Sedang Diproses Concierge',
                                'selesai' => 'Selesai / Terkonfirmasi',
                                'ditutup' => 'Ditutup',
                            ])
                            ->default('baru')
                            ->required(),
                        TextInput::make('response_time_minutes')
                            ->label('Waktu Respons (Menit)')
                            ->numeric()
                            ->default(12),
                    ])
                    ->columns(2),

                Section::make('Detail Kebutuhan & Catatan Khusus')
                    ->schema([
                        CheckboxList::make('special_requests')
                            ->label('Fasilitas / Personalisasi yang Diminati')
                            ->options([
                                'VIP Shuttle / Pick-up' => 'VIP Shuttle / Helipad Transfer',
                                'Diet Halal / Vegan Chef' => 'Fine Dining Pasundan / Menu Khusus',
                                'Early Check-in Priority' => 'Early Check-in Priority',
                                'Grand Ballroom MICE' => 'Fasilitas Grand Ballroom (Tata Suara & Akustik)',
                                'Lotus Spa Treatment' => 'Lotus Spa 90-min Riverside Treatment',
                                'Romantic / Honeymoon' => 'Romantic Deck Candle Light Dinner',
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                        Textarea::make('message')
                            ->label('Pesan / Ekspektasi Pemohon')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

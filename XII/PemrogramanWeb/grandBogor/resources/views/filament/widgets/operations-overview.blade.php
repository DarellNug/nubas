<x-filament-widgets::widget>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; margin-top: 1.5rem; margin-bottom: 1.5rem;">
        
        {{-- Card 1: Inspeksi Kebersihan --}}
        <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 1rem; padding: 1.25rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);">
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; margin-bottom: 0.75rem;">
                    <h4 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0;">Inspeksi Kebersihan</h4>
                    <span style="display: inline-flex; align-items: center; padding: 0.2rem 0.65rem; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; background-color: #fef3c7; color: #92400e;">
                        Housekeeping Live
                    </span>
                </div>
                <p style="font-size: 0.8125rem; color: #4b5563; line-height: 1.5; margin-bottom: 1.25rem;">
                    42 Kamar terverifikasi Higienis Steril standar internasional. 6 unit sedang pembersihan berkala jelang check-in jam 14:00.
                </p>
            </div>
            <div>
                <a href="{{ route('filament.admin.resources.housekeeping-logs.index') }}"
                   style="display: block; width: 100%; padding: 0.6rem 1rem; text-align: center; font-size: 0.8125rem; font-weight: 600; color: #374151; background-color: #f3f4f6; border: 1px solid #e5e7eb; border-radius: 0.5rem; text-decoration: none; transition: background-color 0.2s;">
                    Lihat Log Housekeeping
                </a>
            </div>
        </div>

        {{-- Card 2: Skema Tarif Musiman --}}
        <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 1rem; padding: 1.25rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);">
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; margin-bottom: 0.75rem;">
                    <h4 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0;">Skema Tarif Musiman</h4>
                    <span style="display: inline-flex; align-items: center; padding: 0.2rem 0.65rem; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; background-color: #fde68a; color: #78350f;">
                        High Season Active
                    </span>
                </div>
                <p style="font-size: 0.8125rem; color: #4b5563; line-height: 1.5; margin-bottom: 1.25rem;">
                    Pengganda otomatis (+15%) aktif untuk akhir pekan & libur nasional. Batas kuota promosi tersisa 4 kamar.
                </p>
            </div>
            <div>
                <a href="{{ route('filament.admin.resources.rooms.index') }}"
                   style="display: block; width: 100%; padding: 0.6rem 1rem; text-align: center; font-size: 0.8125rem; font-weight: 600; color: #374151; background-color: #f3f4f6; border: 1px solid #e5e7eb; border-radius: 0.5rem; text-decoration: none; transition: background-color 0.2s;">
                    Atur Aturan Dynamic Pricing
                </a>
            </div>
        </div>

        {{-- Card 3: Inquiry & Tamu Khusus --}}
        <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 1rem; padding: 1.25rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);">
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; margin-bottom: 0.75rem;">
                    <h4 style="font-size: 1rem; font-weight: 700; color: #111827; margin: 0;">Inquiry & Tamu Khusus</h4>
                    <span style="display: inline-flex; align-items: center; padding: 0.2rem 0.65rem; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; background-color: #fee2e2; color: #991b1b;">
                        5 Prioritas VIP
                    </span>
                </div>
                <p style="font-size: 0.8125rem; color: #4b5563; line-height: 1.5; margin-bottom: 1.25rem;">
                    Terdapat 19 pertanyaan reservasi belum terkonfirmasi, termasuk reservasi korporat paket gathering Kementrian.
                </p>
            </div>
            <div>
                <a href="{{ route('filament.admin.resources.inquiries.index') }}"
                   style="display: block; width: 100%; padding: 0.6rem 1rem; text-align: center; font-size: 0.8125rem; font-weight: 600; color: #ffffff; background-color: #745711; border: 1px solid #634a0e; border-radius: 0.5rem; text-decoration: none; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: background-color 0.2s;">
                    Buka Kotak Masuk Reservasi
                </a>
            </div>
        </div>

    </div>
</x-filament-widgets::widget>

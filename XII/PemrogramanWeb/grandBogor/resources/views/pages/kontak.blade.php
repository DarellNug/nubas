@extends('layouts.resort')

@section('title', 'Kontak & Reservasi Kamar | Grand Bogor Resort & Botanical Sanctuary')

@section('content')

    <!-- HERO HEADER (Page 5 in PDF) -->
    <section class="relative py-20 bg-pine-950 text-white overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-25">
            <img src="{{ asset('images/resort/p5_28_3014.jpg') }}" alt="Peta & Akses Grand Bogor" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-pine-950 via-pine-900/90 to-pine-950"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-900/60 border border-gold-500/40 text-gold-300 text-xs tracking-[0.2em] uppercase font-semibold mb-6 shadow-md backdrop-blur-xs">
                LAYANAN CONCIERGE 24 JAM
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold tracking-tight text-white max-w-4xl mx-auto mb-6 leading-tight">
                Hubungi Concierge Kami — Sanctuary Ketenangan Menanti Kedatangan Anda.
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-3xl mx-auto font-light leading-relaxed mb-12">
                Tim perhotelan pribadi kami siap mempersonalisasi setiap detik liburan Anda di dataran tinggi Cisarua. Mulai dari penjemputan helipad, pengaturan vila privat, hingga kebutuhan kuliner khusus.
            </p>

            <!-- 4 Assurance Badges (Authentic from Page 5 PDF) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">
                <div class="bg-pine-900/80 backdrop-blur-sm p-4 rounded-xl border border-emerald-800/40 text-center">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block">GARANSI RESPONS</span>
                    <span class="font-serif text-lg font-bold text-gold-400 block my-0.5">≤ 60 Menit</span>
                </div>
                <div class="bg-pine-900/80 backdrop-blur-sm p-4 rounded-xl border border-emerald-800/40 text-center">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block">ENKRIPSI DATA</span>
                    <span class="font-serif text-lg font-bold text-gold-400 block my-0.5">SSL 256-Bit</span>
                </div>
                <div class="bg-pine-900/80 backdrop-blur-sm p-4 rounded-xl border border-emerald-800/40 text-center">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block">DEDICATED BUTLER</span>
                    <span class="font-serif text-lg font-bold text-gold-400 block my-0.5">Tersedia 24/7</span>
                </div>
                <div class="bg-pine-900/80 backdrop-blur-sm p-4 rounded-xl border border-emerald-800/40 text-center">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block">AKSES PINTU TOL</span>
                    <span class="font-serif text-lg font-bold text-gold-400 block my-0.5">25 Menit Ciawi</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SUCCESS ALERT -->
    @if(session('success'))
        <section class="max-w-4xl mx-auto px-4 sm:px-6 -mt-8 relative z-30">
            <div class="bg-emerald-900 text-white p-6 sm:p-8 rounded-2xl shadow-2xl border-2 border-gold-400">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-emerald-800 flex items-center justify-center text-gold-400 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div class="space-y-2">
                        <span class="text-xs font-bold text-gold-300 uppercase tracking-widest block">PERMINTAAN RESERVASI BERHASIL DIKIRIM</span>
                        <h3 class="font-serif text-2xl font-bold">Terima Kasih, {{ session('success')['name'] }}!</h3>
                        <p class="text-xs sm:text-sm text-emerald-100 leading-relaxed">
                            Kode Reservasi Anda: <strong class="text-gold-300 font-mono text-base px-2 py-0.5 bg-black/40 rounded">{{ session('success')['code'] }}</strong>.
                            Concierge kami sedang memvalidasi slot ketersediaan untuk unit <strong>{{ session('success')['room'] }}</strong> ({{ session('success')['nights'] }} Malam: {{ session('success')['check_in'] }} - {{ session('success')['check_out'] }}).
                            Konfirmasi resmi beserta detail tagihan akan dikirimkan ke WhatsApp & Email Anda dalam kurun waktu <strong>≤ 60 Menit</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- MAIN CONTACT & RESERVATION SECTION (Page 5 in PDF) -->
    <section class="py-20 bg-white border-b border-stone-200" id="reservasi">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                <!-- Left Column: Official Contact Channels & Navigation Guide (5 cols) -->
                <div class="lg:col-span-5 space-y-8">
                    
                    <!-- Official Channels -->
                    <div class="bg-stone-50 p-8 rounded-3xl border border-stone-200 shadow-xs space-y-6">
                        <div>
                            <span class="text-xs uppercase tracking-[0.2em] font-bold text-gold-600 block mb-1">
                                SALURAN RESMI
                            </span>
                            <h2 class="font-serif text-2xl font-bold text-pine-900">
                                Informasi Kontak Langsung
                            </h2>
                        </div>

                        <div class="space-y-4 text-xs text-stone-700">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-pine-900 text-gold-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-pine-900 font-bold block mb-0.5">Alamat Resor & Botanical Park</strong>
                                    <p class="leading-relaxed">Jl. Raya Puncak Km 84, Cisarua, Bogor, Jawa Barat 16750, Indonesia</p>
                                    <span class="text-stone-500 text-[11px] block mt-1">Koordinat GPS: 6°41'42.8"S 106°57'12.4"E</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-pine-900 text-gold-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-pine-900 font-bold block mb-0.5">Telepon Langsung (Hunting Line)</strong>
                                    <p class="font-medium text-pine-900 text-sm">+62 251 8259 888</p>
                                    <span class="text-stone-500 text-[11px]">Pusat switchboard aktif 8 saluran paralel</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-800 text-gold-300 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.35.49 1.199.533 1.286.044.087.073.188.014.304-.058.115-.087.188-.173.289l-.26.303c-.087.088-.178.183-.076.358.101.174.451.744.968 1.205.666.594 1.228.778 1.402.865.173.086.275.072.376-.044.101-.116.433-.506.549-.679.116-.174.232-.145.39-.087s1.011.477 1.184.564.289.13.332.203c.044.072.044.419-.1.824z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-pine-900 font-bold block mb-0.5">WhatsApp Concierge 24 Jam</strong>
                                    <p class="font-bold text-emerald-800 text-sm">+62 811 8900 777</p>
                                    <span class="text-stone-500 text-[11px]">Pesan teks instan, itinerary privat & fast-track check-in</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-pine-900 text-gold-400 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-pine-900 font-bold block mb-0.5">Email Korespondensi Reservasi</strong>
                                    <p class="font-medium text-pine-900">reservation@grandbogorresort.id</p>
                                    <span class="text-stone-500 text-[11px]">Balasan proposal resmi & invoice korporat</span>
                                </div>
                            </div>

                            <div class="pt-2 border-t border-stone-200">
                                <span class="text-stone-500 text-[11px] block">
                                    <strong>Jam Operasional:</strong> 24 Jam Setiap Hari • Check-in: 14:00 WIB • Check-out: 12:00 WIB
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Guide (Authentic from Page 5 PDF) -->
                    <div class="bg-stone-50 p-8 rounded-3xl border border-stone-200 shadow-xs space-y-4">
                        <span class="text-xs uppercase tracking-[0.2em] font-bold text-gold-600 block mb-1">
                            NAVIGASI PETA
                        </span>
                        <h3 class="font-serif text-xl font-bold text-pine-900">
                            Akses Lokasi & Rute Tol Ciawi
                        </h3>
                        <ol class="space-y-3 text-xs text-stone-600 list-decimal list-inside leading-relaxed">
                            <li>Ambil exit Gerbang Tol Ciawi arah Gadog / Puncak (KM 47 Jagorawi).</li>
                            <li>Lanjutkan menuju Jl. Raya Puncak selama 14,2 km melalui Cipayung & Megamendung.</li>
                            <li>Setelah Pasar Cisarua, 1,8 km di sisi kanan terdapat gapura batu alam Grand Bogor Resort.</li>
                            <li>Fasilitas Valet Parking & Luggage Escort siap menyambut di lobi utama.</li>
                        </ol>
                        <div class="pt-2">
                            <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-pine-900 hover:text-gold-600">
                                <span>Buka Petunjuk di Google Maps</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Helipad & Private Transfer (Page 5 in PDF) -->
                    <div class="bg-pine-900 text-white p-8 rounded-3xl border border-gold-500/30 space-y-3">
                        <span class="text-gold-400 text-[11px] font-bold uppercase tracking-wider block">
                            PRIVILEGED EXPERIENCE
                        </span>
                        <h3 class="font-serif text-lg font-bold text-white">
                            Layanan Helipad & Private Transfer
                        </h3>
                        <p class="text-xs text-stone-300 leading-relaxed font-light">
                            Tersedia helipad berlisensi ICAO dengan koordinat langsung untuk penerbangan charter dari Bandara Halim Perdanakusuma (18 menit tempuh). Hubungi tim VIP kami untuk koordinat izin ATC.
                        </p>
                        <div class="p-3 rounded-lg bg-pine-950/80 border border-emerald-800/40 text-xs">
                            <span class="text-stone-400 block text-[10px]">Bogor Helipad Sanctuary Code:</span>
                            <strong class="text-gold-400 font-mono text-sm">WRO-GBR</strong>
                        </div>
                    </div>

                </div>

                <!-- Right Column: 3-Step Interactive Booking Form (7 cols) -->
                <div class="lg:col-span-7">
                    <div class="bg-stone-50 p-8 sm:p-12 rounded-3xl border border-stone-200 shadow-lg">
                        
                        <div class="mb-8">
                            <span class="text-xs uppercase tracking-[0.2em] font-bold text-gold-600 block mb-1">
                                INQUIRY & RESERVATION REQUEST
                            </span>
                            <h2 class="font-serif text-2xl sm:text-3xl font-bold text-pine-900 mb-2">
                                Formulir Pemesanan & Pertanyaan
                            </h2>
                            <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                                Lengkapi preferensi menginap Anda di bawah ini. Concierge kami akan memvalidasi ketersediaan vila dan mengirimkan konfirmasi reservasi resmi beserta detail penawaran.
                            </p>
                        </div>

                        <!-- 3-Step Form -->
                        <form action="{{ route('reservasi.store') }}" method="POST" class="space-y-8">
                            @csrf

                            <!-- STEP 1: DATA PERSONAL TAMU -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-2 border-b border-stone-300 pb-2">
                                    <span class="w-6 h-6 rounded-full bg-pine-900 text-gold-300 text-xs font-bold flex items-center justify-center">1</span>
                                    <h3 class="font-serif text-sm font-bold text-pine-900 uppercase tracking-wider">DATA PERSONAL TAMU</h3>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-stone-700 mb-1">
                                            Nama Lengkap Tamu * <span class="text-stone-400 font-normal">(Sesuai KTP/Paspor)</span>
                                        </label>
                                        <input type="text" name="guest_name" required value="{{ old('guest_name') }}" placeholder="e.g. Raden Arya Wicaksana" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                        @error('guest_name') <p class="text-red-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-stone-700 mb-1">
                                            Alamat Email * <span class="text-stone-400 font-normal">(Untuk Voucher Digital)</span>
                                        </label>
                                        <input type="email" name="guest_email" required value="{{ old('guest_email') }}" placeholder="nama@domain.com" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                        @error('guest_email') <p class="text-red-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-stone-700 mb-1">
                                        Nomor WhatsApp / Seluler Aktif * <span class="text-stone-400 font-normal">(Respons Instan 24 Jam)</span>
                                    </label>
                                    <input type="text" name="guest_phone" required value="{{ old('guest_phone') }}" placeholder="+62 812 3456 7890" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                    @error('guest_phone') <p class="text-red-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <!-- STEP 2: PREFERENSI RUANGAN & KEDATANGAN -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-2 border-b border-stone-300 pb-2">
                                    <span class="w-6 h-6 rounded-full bg-pine-900 text-gold-300 text-xs font-bold flex items-center justify-center">2</span>
                                    <h3 class="font-serif text-sm font-bold text-pine-900 uppercase tracking-wider">PREFERENSI RUANGAN & KEDATANGAN</h3>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-stone-700 mb-1">
                                            Tipe Kamar / Sanctuary Suite *
                                        </label>
                                        <select name="room_id" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                            <option value="">Pilih Akomodasi</option>
                                            @foreach($rooms as $r)
                                                <option value="{{ $r->id }}" {{ (request('room') == $r->code || $selectedRoomId == $r->id) ? 'selected' : '' }}>
                                                    {{ $r->code }} - {{ $r->name }} (Rp {{ number_format($r->price_per_night, 0, ',', '.') }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-stone-700 mb-1">
                                            Jumlah Tamu Dewasa & Anak *
                                        </label>
                                        <select name="guest_adults" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                            <option value="1">1 Dewasa</option>
                                            <option value="2" selected>2 Dewasa (Couple / Pair)</option>
                                            <option value="3">3 Dewasa</option>
                                            <option value="4">4 Dewasa (Family)</option>
                                            <option value="6">6 Dewasa (Villa)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-stone-700 mb-1">
                                            Tanggal Check-In *
                                        </label>
                                        <input type="date" name="check_in_date" required value="{{ request('check_in', date('Y-m-d', strtotime('+1 day'))) }}" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-stone-700 mb-1">
                                            Tanggal Check-Out *
                                        </label>
                                        <input type="date" name="check_out_date" required value="{{ request('check_out', date('Y-m-d', strtotime('+3 days'))) }}" class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden">
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 3: PERMINTAAN KHUSUS & PERSONALISASI LAYANAN -->
                            <div class="space-y-4">
                                <div class="flex items-center gap-2 border-b border-stone-300 pb-2">
                                    <span class="w-6 h-6 rounded-full bg-pine-900 text-gold-300 text-xs font-bold flex items-center justify-center">3</span>
                                    <h3 class="font-serif text-sm font-bold text-pine-900 uppercase tracking-wider">PERMINTAAN KHUSUS & PERSONALISASI LAYANAN</h3>
                                </div>

                                <!-- 6 Authentic Checkbox Items from Page 5 PDF -->
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-xs text-stone-700">
                                    <label class="flex items-center gap-2 p-3 rounded-lg bg-white border border-stone-200 hover:border-gold-500 cursor-pointer transition">
                                        <input type="checkbox" name="special_requests[]" value="Extra Bed Setup" class="rounded text-pine-900 focus:ring-pine-900">
                                        <span>Extra Bed Setup</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-3 rounded-lg bg-white border border-stone-200 hover:border-gold-500 cursor-pointer transition">
                                        <input type="checkbox" name="special_requests[]" value="Romantic / Honeymoon" class="rounded text-pine-900 focus:ring-pine-900">
                                        <span>Romantic / Honeymoon</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-3 rounded-lg bg-white border border-stone-200 hover:border-gold-500 cursor-pointer transition">
                                        <input type="checkbox" name="special_requests[]" value="Baby Cot / Crib" class="rounded text-pine-900 focus:ring-pine-900">
                                        <span>Baby Cot / Crib</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-3 rounded-lg bg-white border border-stone-200 hover:border-gold-500 cursor-pointer transition">
                                        <input type="checkbox" name="special_requests[]" value="VIP Shuttle / Pick-up" class="rounded text-pine-900 focus:ring-pine-900">
                                        <span>VIP Shuttle / Pick-up</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-3 rounded-lg bg-white border border-stone-200 hover:border-gold-500 cursor-pointer transition">
                                        <input type="checkbox" name="special_requests[]" value="Early Check-in Priority" class="rounded text-pine-900 focus:ring-pine-900">
                                        <span>Early Check-in Priority</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-3 rounded-lg bg-white border border-stone-200 hover:border-gold-500 cursor-pointer transition">
                                        <input type="checkbox" name="special_requests[]" value="Diet Halal / Vegan Chef" class="rounded text-pine-900 focus:ring-pine-900">
                                        <span>Diet Halal / Vegan Chef</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-stone-700 mb-1">
                                        Pesan Tambahan & Kebutuhan Spesifik <span class="text-stone-400 font-normal">(Opsional)</span>
                                    </label>
                                    <textarea name="message" rows="3" placeholder="Ceritakan ekspektasi Anda: contoh penataan bunga mawar di kamar, perayaan hari jadi, alergi kacang/gluten, atau permintaan kamar bebas asap rokok di lantai atas..." class="w-full px-3.5 py-2.5 rounded-lg border border-stone-300 text-xs focus:ring-2 focus:ring-pine-900 focus:outline-hidden"></textarea>
                                </div>
                            </div>

                            <!-- Footer Security & Submit Button -->
                            <div class="pt-4 border-t border-stone-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div class="text-[11px] text-stone-500 leading-tight">
                                    <p>Data identitas Anda dijaga secara ketat berdasarkan Regulasi Privasi Tamu & Standar CHSE.</p>
                                    <span class="text-emerald-800 font-semibold">Respons ≤ 1 Jam • SSL Encrypted Transmission</span>
                                </div>
                                <button type="submit" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-pine-900 hover:bg-pine-850 text-gold-300 hover:text-white font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-xl hover:-translate-y-0.5 whitespace-nowrap">
                                    Kirim Permintaan Reservasi
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CONCIERGE FAQ (Page 5 in PDF) -->
    <section class="py-20 bg-stone-50 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs uppercase tracking-[0.2em] font-bold text-gold-600 block mb-1">
                    CONCIERGE FAQ
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold text-pine-900">
                    Pertanyaan Sering Ditanyakan Seputar Reservasi
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- FAQ 1 -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs">
                    <h3 class="font-serif text-base font-bold text-pine-900 mb-2">Kapan Pembayaran Diproses?</h3>
                    <p class="text-stone-600 text-xs leading-relaxed">
                        Formulir di atas merupakan pengajuan reservasi langsung. Setelah ketersediaan slot kamar dikonfirmasi butler kami via WhatsApp/Email, Anda akan menerima tagihan resmi dengan opsi Virtual Account, Kartu Kredit, atau Bank Transfer.
                    </p>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs">
                    <h3 class="font-serif text-base font-bold text-pine-900 mb-2">Bagaimana Kebijakan Ganjil-Genap Puncak?</h3>
                    <p class="text-stone-600 text-xs leading-relaxed">
                        Tamu dengan konfirmasi reservasi resmi berhak menerima Surat Jalan Elektronik dari resort yang dapat ditunjukkan kepada petugas Satlantas di pos pantau Simpang Gadog jika diperlukan panduan rute alternatif.
                    </p>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs">
                    <h3 class="font-serif text-base font-bold text-pine-900 mb-2">Ketentuan Pembatalan & Reschedule?</h3>
                    <p class="text-stone-600 text-xs leading-relaxed">
                        Reschedule gratis diperbolehkan hingga 7 hari sebelum tanggal check-in terpilih. Untuk pembatalan mendesak, silakan hubungi WhatsApp VIP Concierge untuk bantuan restrukturisasi tanggal menginap.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

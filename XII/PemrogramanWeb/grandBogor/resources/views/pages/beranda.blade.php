@extends('layouts.resort')

@section('title', 'Grand Bogor Resort & Botanical Sanctuary | Harmoni Alam & Kemewahan Tradisi di Ketinggian Puncak')

@section('content')

    <!-- HERO SECTION (Authentic Page 1 PDF) -->
    <section class="relative min-h-[660px] lg:min-h-[760px] flex items-center bg-[#072420] overflow-hidden">
        <!-- Background Scenery with Authentic Atmospheric Lighting -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/resort/p1_11_87.jpg') }}" alt="Grand Bogor Resort Mountain Panorama" class="w-full h-full object-cover object-center transform transition-transform duration-700">
            <!-- Left-to-right gradient to keep misty mountains visible while giving high contrast for text -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#061e1b]/90 via-[#061e1b]/50 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#061e1b]/60 via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24 w-full">
            <!-- Top Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-black/40 border border-white/20 text-emerald-300 text-xs tracking-[0.2em] uppercase font-semibold mb-6 shadow-md backdrop-blur-md">
                <svg class="w-3.5 h-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 01-9-9c0-4.97 4.03-9 9-9 4.97 0 9 4.03 9 9a9 9 0 01-9 9zm0-18C7.03 3 3 7.03 3 12c0 2.5 1 4.7 2.6 6.3l1.4-1.4C5.7 15.6 5 13.9 5 12c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7v2c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/></svg>
                <span>SANCTUARY TERSEMBUNYI DI CISARUA, PUNCAK</span>
            </div>

            <!-- Main Headline (Authentic Left-Aligned from PDF) -->
            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-tight mb-6 max-w-3xl drop-shadow-sm">
                Harmoni Alam & Kemewahan<br>
                Tradisi di Ketinggian Puncak Bogor
            </h1>

            <!-- Subheading -->
            <p class="text-stone-200 text-sm sm:text-base lg:text-lg max-w-2xl leading-relaxed font-light mb-8 drop-shadow-xs">
                Sanctuary peristirahatan eksklusif di lereng Gunung Salak dengan panorama lembah pinus berkabut, kebun botani 12 hektar, dan kehangatan keramahan Pasundan autentik berpadu kemewahan modern.
            </p>

            <!-- Key Metric Chips (Left-aligned) -->
            <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-8">
                <div class="bg-black/45 backdrop-blur-md px-4 py-2.5 rounded-xl border border-white/15 flex items-center gap-3 text-left shadow-sm">
                    <svg class="w-5 h-5 text-stone-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 20l7-12 5 8 3-4 3 8H3z"/></svg>
                    <div>
                        <span class="text-stone-400 text-[9px] uppercase font-bold tracking-wider block">KETINGGIAN</span>
                        <span class="text-white font-bold text-xs sm:text-sm tracking-wide">1.150 mdpl</span>
                    </div>
                </div>
                <div class="bg-black/45 backdrop-blur-md px-4 py-2.5 rounded-xl border border-white/15 flex items-center gap-3 text-left shadow-sm">
                    <svg class="w-5 h-5 text-stone-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v6m0 0a3 3 0 100 6 3 3 0 000-6zm-2-9a2 2 0 014 0v10.268a4.5 4.5 0 11-4 0V3z"/></svg>
                    <div>
                        <span class="text-stone-400 text-[9px] uppercase font-bold tracking-wider block">SUHU SEJUK ALAMI</span>
                        <span class="text-white font-bold text-xs sm:text-sm tracking-wide">18°C – 22°C</span>
                    </div>
                </div>
                <div class="bg-black/45 backdrop-blur-md px-4 py-2.5 rounded-xl border border-white/15 flex items-center gap-3 text-left shadow-sm">
                    <svg class="w-5 h-5 text-stone-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <div>
                        <span class="text-stone-400 text-[9px] uppercase font-bold tracking-wider block">PELAYANAN</span>
                        <span class="text-white font-bold text-xs sm:text-sm tracking-wide">24/7 Private Butler</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FLOATING SEARCH WIDGET (Overlapping bottom edge) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 lg:-mt-14 relative z-20">
        <div class="bg-white px-6 py-5 rounded-2xl sm:rounded-3xl shadow-2xl border border-stone-200/80 text-stone-800">
            <form action="{{ url('/kontak') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-6 items-center">
                <div class="lg:border-r border-stone-200/80 lg:pr-5">
                    <label class="block text-[11px] font-bold text-stone-600 mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Tanggal Check-in</span>
                    </label>
                    <input type="text" name="check_in" value="05/16/2025" class="w-full text-sm font-semibold text-stone-900 bg-transparent border-0 p-0 focus:ring-0 focus:outline-hidden cursor-pointer">
                </div>
                <div class="lg:border-r border-stone-200/80 lg:pr-5">
                    <label class="block text-[11px] font-bold text-stone-600 mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Tanggal Check-out</span>
                    </label>
                    <input type="text" name="check_out" value="05/18/2025" class="w-full text-sm font-semibold text-stone-900 bg-transparent border-0 p-0 focus:ring-0 focus:outline-hidden cursor-pointer">
                </div>
                <div class="lg:border-r border-stone-200/80 lg:pr-5">
                    <label class="block text-[11px] font-bold text-stone-600 mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Jumlah Tamu</span>
                    </label>
                    <select name="guests" class="w-full text-sm font-semibold text-stone-900 bg-transparent border-0 p-0 focus:ring-0 focus:outline-hidden cursor-pointer">
                        <option value="2 Dewasa, 0 Anak" selected>2 Dewasa, 0 Anak</option>
                        <option value="2 Dewasa, 1 Anak">2 Dewasa, 1 Anak</option>
                        <option value="4 Dewasa">4 Dewasa (Family)</option>
                        <option value="6 Dewasa">6 Dewasa (Villa)</option>
                    </select>
                </div>
                <div class="lg:border-r border-stone-200/80 lg:pr-5">
                    <label class="block text-[11px] font-bold text-stone-600 mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>Kategori Kamar</span>
                    </label>
                    <select name="category" class="w-full text-sm font-semibold text-stone-900 bg-transparent border-0 p-0 focus:ring-0 focus:outline-hidden cursor-pointer">
                        <option value="" selected>Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="w-full py-3.5 px-6 rounded-2xl bg-black hover:bg-neutral-800 text-white font-bold text-xs uppercase tracking-wider transition-all duration-200 shadow-md hover:shadow-lg hover:-translate-y-0.5 active:scale-95 flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <span>Cek Ketersediaan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FILOSOFI PERISTIRAHATAN (Page 1 in PDF) -->
    <section class="pt-24 pb-20 bg-[#FBFBFB] border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- 2-Column Split Header Matching PDF -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-14 gap-6">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] font-bold text-[#85681B] block mb-2">
                        FILOSOFI PERISTIRAHATAN
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900">
                        Kenyamanan Hakiki Bernuansa Alami
                    </h2>
                </div>
                <div class="max-w-md">
                    <p class="text-stone-600 text-sm leading-relaxed">
                        Setiap jengkal kawasan dirancang untuk menyelaraskan ketenangan jiwa Anda dengan lanskap hutan pinus tropis dan udara pegunungan yang murni.
                    </p>
                </div>
            </div>

            <!-- 3 Pillars Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1: Kebun Botani 12 Hektar -->
                <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200/80 hover:border-[#85681B]/40 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p1_33_336.jpg') }}" alt="Kebun Botani Pribadi 12 Hektar" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[11px] font-semibold px-3 py-1 rounded-full flex items-center gap-1.5">
                            <span class="text-emerald-400">🏕</span>
                            <span>12 Hektar Area Terbuka</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-serif text-xl font-bold text-stone-900 mb-2.5">
                                Kebun Botani Pribadi 12 Hektar
                            </h3>
                            <p class="text-stone-600 text-xs leading-relaxed mb-5">
                                Koleksi kurasi lebih dari 340 spesies flora tropis langka, lintasan jalan santai beraroma pinus segar, serta gazebo meditasi di tepi aliran sungai alami lereng Salak.
                            </p>
                        </div>
                        <a href="{{ url('/tentang-kami') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-stone-900 group-hover:text-[#85681B] transition">
                            <span>Jelajahi Jalur Botani</span>
                            <span class="text-sm">→</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Infinity Pool Air Hangat -->
                <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200/80 hover:border-[#85681B]/40 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p1_34_336.jpg') }}" alt="Infinity Pool Air Hangat Pegunungan" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[11px] font-semibold px-3 py-1 rounded-full flex items-center gap-1.5">
                            <span class="text-amber-400">♨</span>
                            <span>Air Hangat 34°C</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-serif text-xl font-bold text-stone-900 mb-2.5">
                                Infinity Pool Air Hangat Pegunungan
                            </h3>
                            <p class="text-stone-600 text-xs leading-relaxed mb-5">
                                Berenang dengan kenyamanan air termal hangat terkontrol 34°C seraya menyaksikan matahari terbenam spektakuler di balik siluet kemegahan Gunung Salak.
                            </p>
                        </div>
                        <a href="{{ url('/galeri') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-stone-900 group-hover:text-[#85681B] transition">
                            <span>Lihat Fasilitas Akuatik</span>
                            <span class="text-sm">→</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Gastronomi Pasundan & Fine Dining -->
                <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200/80 hover:border-[#85681B]/40 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p1_35_354.jpg') }}" alt="Gastronomi Pasundan & Fine Dining" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[11px] font-semibold px-3 py-1 rounded-full flex items-center gap-1.5">
                            <span class="text-amber-400">🍽</span>
                            <span>Farm-to-Table Dining</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-serif text-xl font-bold text-stone-900 mb-2.5">
                                Gastronomi Pasundan & Fine Dining
                            </h3>
                            <p class="text-stone-600 text-xs leading-relaxed mb-5">
                                Cita rasa warisan priangan dan internasional diolah oleh master chef menggunakan bahan-bahan organik yang dipetik setiap fajar dari kebun hidroponik resor.
                            </p>
                        </div>
                        <a href="{{ url('/kontak') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-stone-900 group-hover:text-[#85681B] transition">
                            <span>Daftar Menu & Reservasi Restoran</span>
                            <span class="text-sm">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KOLEKSI HUNIAN EKSKLUSIF (3 Showcase Rooms from Page 1 PDF) -->
    <section class="py-24 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] font-bold text-[#85681B] block mb-2">
                        KOLEKSI HUNIAN EKSKLUSIF
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900">
                        Kamar, Suite, & Private Villa
                    </h2>
                </div>
                <div>
                    <a href="{{ url('/kontak') }}" class="text-xs font-bold text-stone-900 hover:text-[#85681B] flex items-center gap-1 border-b border-stone-900 pb-1 transition">
                        <span>Lihat Semua 42 Unit Kamar</span>
                        <span class="text-sm">↗</span>
                    </a>
                </div>
            </div>

            <!-- 3 Authentic Showcase Rooms Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Room 1: Deluxe Forest View (DF-102) -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1">
                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ asset('images/resort/p1_1_161.jpg') }}" alt="Deluxe Forest View" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            2 Tamu Dewasa
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-baseline mb-2">
                                <h3 class="font-serif text-2xl font-bold text-stone-900">Deluxe Forest View</h3>
                                <span class="text-xs font-bold text-stone-700 bg-stone-100 px-2.5 py-0.5 rounded border border-stone-200">48 m²</span>
                            </div>
                            <p class="text-stone-600 text-xs leading-relaxed mb-4">
                                Balkon privat langsung menghadap keteduhan hutan pinus dengan kasur King Koil Signature, shower marmer pegunungan, dan pencahayaan hangat.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Balkon Privat</span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Wi-Fi 6</span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Nespresso</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider text-stone-400 block font-semibold">TARIF PER MALAM</span>
                                <span class="font-serif text-xl font-bold text-stone-900">Rp 1.850.000</span>
                            </div>
                            <a href="{{ url('/kontak?room=DF-102#reservasi') }}" class="px-6 py-2.5 rounded-lg bg-[#212121] hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition hover:shadow-md active:scale-95">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Room 2: Grand Executive Suite (ES-304) -->
                <div class="bg-white rounded-2xl overflow-hidden border-2 border-[#85681B]/70 shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col relative hover:-translate-y-1">
                    <div class="absolute -top-3 right-6 bg-[#C89D46] text-stone-950 text-[10px] font-extrabold px-3 py-0.5 rounded-full uppercase tracking-wider shadow-xs z-20">
                        PALING DIMINATI
                    </div>
                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ asset('images/resort/p1_2_202.jpg') }}" alt="Grand Executive Suite" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            Hingga 3 Tamu
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-baseline mb-2">
                                <h3 class="font-serif text-2xl font-bold text-stone-900">Grand Executive Suite</h3>
                                <span class="text-xs font-bold text-stone-700 bg-stone-100 px-2.5 py-0.5 rounded border border-stone-200">86 m²</span>
                            </div>
                            <p class="text-stone-600 text-xs leading-relaxed mb-4">
                                Ruang tamu terpisah, bathtub marmer freestanding dengan panorama gunung, serta akses istimewa ke exclusive evening cocktail lounge.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Bathtub Marmer</span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Ruang Duduk</span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Akses Lounge</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider text-stone-400 block font-semibold">TARIF PER MALAM</span>
                                <span class="font-serif text-xl font-bold text-stone-900">Rp 3.400.000</span>
                            </div>
                            <a href="{{ url('/kontak?room=ES-304#reservasi') }}" class="px-6 py-2.5 rounded-lg bg-[#212121] hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition hover:shadow-md active:scale-95">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Room 3: Presidential Pine Villa (PV-001) -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col hover:-translate-y-1">
                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ asset('images/resort/p1_3_230.jpg') }}" alt="Presidential Pine Villa" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            Kapasitas 6 Tamu
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-baseline mb-2">
                                <h3 class="font-serif text-2xl font-bold text-stone-900">Presidential Pine Villa</h3>
                                <span class="text-xs font-bold text-stone-700 bg-stone-100 px-2.5 py-0.5 rounded border border-stone-200">210 m²</span>
                            </div>
                            <p class="text-stone-600 text-xs leading-relaxed mb-4">
                                Kenyamanan tanpa kompromi: 3 kamar tidur, kolam renang hangat pribadi, gazebo BBQ, dapur koki, dan layanan dedicated private butler 24 jam.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Private Pool</span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">Gazebo BBQ</span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-[11px] font-medium text-stone-700">24h Butler</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider text-stone-400 block font-semibold">TARIF PER MALAM</span>
                                <span class="font-serif text-xl font-bold text-stone-900">Rp 7.800.000</span>
                            </div>
                            <a href="{{ url('/kontak?room=PV-001#reservasi') }}" class="px-6 py-2.5 rounded-lg bg-[#212121] hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition hover:shadow-md active:scale-95">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- DESTINASI TERPADU: FASILITAS REKREASI & RELAKSASI (Authentic Page 1 PDF Grid) -->
    <section id="fasilitas" class="py-24 bg-[#082622] text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Left-aligned Section Header from PDF -->
            <div class="mb-14">
                <span class="text-xs uppercase tracking-[0.25em] font-bold text-[#E4BF58] block mb-2">
                    DESTINASI TERPADU
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-white mb-3 max-w-2xl leading-tight">
                    Fasilitas Rekreasi & Relaksasi Bintang Lima
                </h2>
                <p class="text-stone-300 text-sm sm:text-base leading-relaxed font-light max-w-3xl">
                    Dari peremajaan raga di spa berbasis rempah tradisional hingga penyelenggaraan konvensi megah bertaraf internasional.
                </p>
            </div>

            <!-- Asymmetric Grid Matching PDF Page 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                
                <!-- Left Tall Card: Lotus Spa & Wellness Ritual (Col span 6) -->
                <div class="lg:col-span-6 relative rounded-2xl overflow-hidden min-h-[500px] flex flex-col justify-end p-8 sm:p-10 border border-emerald-800/40 group shadow-xl">
                    <img src="{{ asset('images/resort/raw_lotus_spa.jpg') }}" alt="Lotus Spa & Wellness Ritual" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#041715] via-[#041715]/70 to-transparent"></div>
                    
                    <div class="relative z-10 space-y-3">
                        <span class="text-[#E4BF58] text-[11px] font-bold uppercase tracking-[0.2em] block">
                            HOLISTIC SANCTUARY
                        </span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-white leading-tight">
                            Lotus Spa & Wellness Ritual
                        </h3>
                        <p class="text-stone-300 text-xs sm:text-sm leading-relaxed font-light">
                            Terapi pijat relaksasi warisan Sunda Kuno memadukan minyak asiri cengkih, serai wangi, dan lulur beras merah organik untuk memulihkan vitalitas tubuh seutuhnya.
                        </p>
                        <div class="pt-2">
                            <a href="{{ url('/kontak') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider border border-white/30 backdrop-blur-xs transition hover:shadow-md active:scale-95">
                                <span>Buku Janji Temu Perawatan</span>
                                <span class="text-sm">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Side (Col span 6): 2 Rows -->
                <div class="lg:col-span-6 flex flex-col gap-6 justify-between">
                    
                    <!-- Top Row: 2 Small Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 flex-1">
                        
                        <!-- Card 1: Salak Heated Pool -->
                        <div class="relative rounded-2xl overflow-hidden min-h-[230px] flex flex-col justify-end p-6 border border-emerald-800/40 group shadow-md hover:-translate-y-0.5 transition">
                            <img src="{{ asset('images/resort/raw_salak_pool.jpg') }}" alt="Salak Heated Pool" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#041715] via-[#041715]/60 to-transparent"></div>
                            <div class="relative z-10">
                                <h4 class="font-serif text-lg font-bold text-white mb-1">Salak Heated Pool</h4>
                                <p class="text-xs text-stone-300">Kolam berpemanas panorama 180°</p>
                            </div>
                        </div>

                        <!-- Card 2: Sky Cigar & Lounge -->
                        <div class="relative rounded-2xl overflow-hidden min-h-[230px] flex flex-col justify-end p-6 border border-emerald-800/40 group shadow-md hover:-translate-y-0.5 transition">
                            <img src="{{ asset('images/resort/raw_sky_cigar.jpg') }}" alt="Sky Cigar & Lounge" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#041715] via-[#041715]/60 to-transparent"></div>
                            <div class="relative z-10">
                                <h4 class="font-serif text-lg font-bold text-white mb-1">Sky Cigar & Lounge</h4>
                                <p class="text-xs text-stone-300">Koleksi sommelier & cerutu premium</p>
                            </div>
                        </div>

                    </div>

                    <!-- Bottom Wide Card: Grand Ballroom MICE -->
                    <div class="relative rounded-2xl overflow-hidden min-h-[230px] flex flex-col justify-end p-6 sm:p-8 border border-emerald-800/40 group shadow-md flex-1">
                        <img src="{{ asset('images/resort/raw_ballroom.jpg') }}" alt="Grand Ballroom MICE" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#041715] via-[#041715]/75 to-transparent"></div>
                        <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                            <div class="max-w-md">
                                <h4 class="font-serif text-xl font-bold text-white mb-1.5">Grand Ballroom MICE</h4>
                                <p class="text-xs text-stone-300 leading-relaxed">
                                    Kapasitas hingga 1.000 pax tanpa pilar dengan tata suara akustik kelas dunia.
                                </p>
                            </div>
                            <div class="shrink-0">
                                <a href="{{ url('/kontak') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-white/15 hover:bg-white/25 text-white font-bold text-xs uppercase tracking-wider border border-white/30 backdrop-blur-xs transition hover:shadow-md active:scale-95">
                                    <span>Paket Pertemuan</span>
                                    <span class="text-sm">→</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- KEPERCAYAAN & KEPUASAN TAMU (Guest Reviews from Page 1 PDF) -->
    <section class="py-24 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- 2-Column Split Header Matching PDF -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 gap-8">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] font-bold text-[#85681B] block mb-2">
                        KEPERCAYAAN & KEPUASAN TAMU
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-stone-900 leading-tight mb-3">
                        Kesan Tak Terlupakan di Setiap Sudut<br>Sanctuary
                    </h2>
                    <p class="text-stone-600 text-sm leading-relaxed font-light max-w-xl">
                        Kisah nyata dari para tamu istimewa kami yang menemukan ketenangan sejati di tengah sejuknya kebun botani Grand Bogor Resort.
                    </p>
                </div>

                <!-- Rating Stats Block on Top Right -->
                <div class="flex items-center gap-6 bg-[#FAFAF8] border border-stone-200 rounded-2xl p-5 shadow-xs shrink-0">
                    <div>
                        <div class="font-serif text-5xl font-bold text-stone-900 leading-none">4.9</div>
                        <div class="flex text-amber-400 text-sm mt-1">★★★★★</div>
                        <div class="text-[11px] text-stone-500 mt-1 leading-tight">
                            Dari <strong>1.480+</strong><br>ulasan terverifikasi
                        </div>
                    </div>
                    <div class="h-14 w-px bg-stone-200"></div>
                    <div class="space-y-1.5 text-xs">
                        <div class="flex items-center gap-1.5 font-semibold text-emerald-800">
                            <span>✓</span> <span>100% Tamu Resmi</span>
                        </div>
                        <div class="flex items-center gap-1.5 font-semibold text-stone-800">
                            <span>⭐</span> <span>Top 3 Luxury Bogor</span>
                        </div>
                        <div class="flex items-center gap-1.5 font-semibold text-[#85681B]">
                            <span>🏆</span> <span>Excellence Award 2024</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 Guest Review Cards (Authentic from Page 1 PDF) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-[#FAFAF8] p-8 rounded-2xl border border-stone-200/80 flex flex-col justify-between hover:shadow-lg transition hover:-translate-y-1">
                    <div>
                        <div class="flex text-amber-400 text-sm mb-4">★★★★★</div>
                        <p class="text-stone-700 text-xs sm:text-sm leading-relaxed italic mb-6">
                            “Suasana hening yang sangat langka ditemukan di kawasan Puncak saat ini. Menikmati teh herbal di beranda Presidential Villa dengan latar pinus berselimut kabut pagi adalah definisi liburan impian keluarga kami.”
                        </p>
                    </div>
                    <div class="pt-4 border-t border-stone-200/60 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#082622] text-[#E4BF58] font-bold flex items-center justify-center text-xs">
                            DR
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-stone-900">Dr. Raden H. Sasongko</h4>
                            <span class="text-[11px] text-stone-500 block">Menginap di Presidential Pine Villa</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-[#FAFAF8] p-8 rounded-2xl border border-stone-200/80 flex flex-col justify-between hover:shadow-lg transition hover:-translate-y-1">
                    <div>
                        <div class="flex text-amber-400 text-sm mb-4">★★★★★</div>
                        <p class="text-stone-700 text-xs sm:text-sm leading-relaxed italic mb-6">
                            “Layanan private butlernya luar biasa responsif dan sopan. Lotus Spa memberikan pengalaman terapi paling menenangkan yang pernah saya rasakan di Indonesia. Suhu kolam air hangatnya sangat pas di cuaca malam 19°C.”
                        </p>
                    </div>
                    <div class="pt-4 border-t border-stone-200/60 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#082622] text-[#E4BF58] font-bold flex items-center justify-center text-xs">
                            AL
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-stone-900">Amelia Laksmono, B.Arch</h4>
                            <span class="text-[11px] text-stone-500 block">Menginap di Grand Executive Suite</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-[#FAFAF8] p-8 rounded-2xl border border-stone-200/80 flex flex-col justify-between hover:shadow-lg transition hover:-translate-y-1">
                    <div>
                        <div class="flex text-amber-400 text-sm mb-4">★★★★★</div>
                        <p class="text-stone-700 text-xs sm:text-sm leading-relaxed italic mb-6">
                            “Penyelenggaraan annual leadership retreat korporasi kami di Grand Ballroom berjalan tanpa cela. Koneksi internet kencang, hidangan prasmanan lezat dengan cita rasa Sunda autentik, dan atmosfer sejuk membuat seluruh delegasi segar.”
                        </p>
                    </div>
                    <div class="pt-4 border-t border-stone-200/60 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#082622] text-[#E4BF58] font-bold flex items-center justify-center text-xs">
                            BW
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-stone-900">Bambang Wicaksono</h4>
                            <span class="text-[11px] text-stone-500 block">Managing Director, Jakarta Tech Venture</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DIRECT PRIVILEGE (Keuntungan Reservasi Langsung from Page 1 PDF) -->
    <section class="py-20 bg-[#F5F5F3]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#09221E] text-white rounded-3xl p-8 sm:p-14 border border-emerald-900/60 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-10">
                <div class="max-w-2xl">
                    <span class="text-xs uppercase tracking-[0.25em] font-bold text-[#E4BF58] block mb-3">
                        KEUNTUNGAN RESERVASI LANGSUNG (DIRECT PRIVILEGE)
                    </span>
                    <h2 class="font-serif text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-4 leading-snug">
                        Dapatkan Complimentary Botanical<br>
                        High-Tea & Layanan Jemputan<br>
                        Eksklusif
                    </h2>
                    <p class="text-stone-300 text-xs sm:text-sm leading-relaxed font-light mb-6">
                        Pesan langsung melalui portal resmi kami untuk menikmati jaminan harga terbaik, gratis sajian High-Tea sore untuk 2 orang, diskon perawatan Lotus Spa 20%, serta layanan penjemputan gratis dari stasiun Bogor atau Bandara Soekarno-Hatta (khusus pemesanan tipe Villa).
                    </p>

                    <!-- Privilege Badges -->
                    <div class="flex flex-wrap items-center gap-3 text-xs font-semibold text-emerald-200">
                        <span class="px-3.5 py-1.5 rounded-full bg-emerald-950 border border-emerald-700/60 flex items-center gap-1.5">
                            <span class="text-emerald-400">✓</span> Best Rate Guarantee
                        </span>
                        <span class="px-3.5 py-1.5 rounded-full bg-emerald-950 border border-emerald-700/60 flex items-center gap-1.5">
                            <span class="text-emerald-400">✓</span> Bebas Pembatalan hingga H-3
                        </span>
                        <span class="px-3.5 py-1.5 rounded-full bg-emerald-950 border border-emerald-700/60 flex items-center gap-1.5">
                            <span class="text-emerald-400">✓</span> Early Check-in Sesuai Ketersediaan
                        </span>
                    </div>
                </div>

                <div class="text-center shrink-0">
                    <a href="{{ url('/kontak#reservasi') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-[#C89D46] hover:bg-[#b58c38] text-stone-950 font-bold text-xs sm:text-sm uppercase tracking-wider transition-all duration-300 shadow-xl hover:-translate-y-0.5 active:scale-95">
                        <span>Klaim Penawaran Eksklusif</span>
                        <span class="text-base">→</span>
                    </a>
                    <p class="text-[11px] text-stone-400 mt-3">*Berlaku untuk periode menginap sepanjang tahun 2025</p>
                </div>
            </div>
        </div>
    </section>

@endsection

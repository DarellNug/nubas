@extends('layouts.resort')

@section('title', 'Galeri Resor & Visual Sanctuary | Grand Bogor Resort')

@section('content')

    <!-- HERO HEADER (Page 3 in PDF) -->
    <section class="relative py-20 bg-pine-950 text-white overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-25">
            <img src="{{ asset('images/resort/p3_39_2137.jpg') }}" alt="Visual Sanctuary Panorama" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-pine-950 via-pine-900/90 to-pine-950"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-900/60 border border-gold-500/40 text-gold-300 text-xs tracking-[0.2em] uppercase font-semibold mb-6 shadow-md backdrop-blur-xs">
                VISUAL SANCTUARY & PANORAMA
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold tracking-tight text-white max-w-4xl mx-auto mb-6 leading-tight">
                Potret Keindahan & Sudut Damai Grand Bogor Resort
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-3xl mx-auto font-light leading-relaxed mb-12">
                Jelajahi visual panorama lanskap pegunungan, kemewahan arsitektur interior kayu jati, dan momen-momen hangat di sanctuary kami.
            </p>

            <!-- 3 Quick Badges -->
            <div class="flex flex-wrap justify-center items-center gap-6 text-xs uppercase tracking-wider">
                <div class="bg-black/40 backdrop-blur-md px-6 py-2.5 rounded-xl border border-white/10">
                    <span class="text-gold-400 font-bold block text-sm">1.150m</span>
                    <span class="text-stone-400 text-[10px]">ELEVASI DPL</span>
                </div>
                <div class="bg-black/40 backdrop-blur-md px-6 py-2.5 rounded-xl border border-white/10">
                    <span class="text-gold-400 font-bold block text-sm">12 Ha</span>
                    <span class="text-stone-400 text-[10px]">KEBUN BOTANI</span>
                </div>
                <div class="bg-black/40 backdrop-blur-md px-6 py-2.5 rounded-xl border border-white/10">
                    <span class="text-gold-400 font-bold block text-sm">4K UHD</span>
                    <span class="text-stone-400 text-[10px]">ARSIP VISUAL</span>
                </div>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE GALLERY (Page 3 in PDF) -->
    <section class="py-20 bg-white border-b border-stone-200" x-data="{ activeTab: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-14" id="gallery-tabs">
                <button type="button" onclick="filterGallery('all')" class="gallery-tab-btn active px-4 py-2 rounded-full text-xs font-bold transition bg-pine-900 text-gold-300 border border-gold-500/40" data-filter="all">
                    Semua Foto (9)
                </button>
                <button type="button" onclick="filterGallery('kamar')" class="gallery-tab-btn px-4 py-2 rounded-full text-xs font-semibold transition bg-stone-100 text-stone-700 hover:bg-stone-200 border border-transparent" data-filter="kamar">
                    Kamar & Vila (2)
                </button>
                <button type="button" onclick="filterGallery('lanskap')" class="gallery-tab-btn px-4 py-2 rounded-full text-xs font-semibold transition bg-stone-100 text-stone-700 hover:bg-stone-200 border border-transparent" data-filter="lanskap">
                    Lanskap & Kebun Botani (2)
                </button>
                <button type="button" onclick="filterGallery('kuliner')" class="gallery-tab-btn px-4 py-2 rounded-full text-xs font-semibold transition bg-stone-100 text-stone-700 hover:bg-stone-200 border border-transparent" data-filter="kuliner">
                    Kuliner & Restoran (2)
                </button>
                <button type="button" onclick="filterGallery('rekreasi')" class="gallery-tab-btn px-4 py-2 rounded-full text-xs font-semibold transition bg-stone-100 text-stone-700 hover:bg-stone-200 border border-transparent" data-filter="rekreasi">
                    Rekreasi & Fasilitas (2)
                </button>
                <button type="button" onclick="filterGallery('mice')" class="gallery-tab-btn px-4 py-2 rounded-full text-xs font-semibold transition bg-stone-100 text-stone-700 hover:bg-stone-200 border border-transparent" data-filter="mice">
                    MICE & Acara Spesial (1)
                </button>
            </div>

            <!-- 9 Gallery Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="gallery-grid">
                
                <!-- 1. Suite Master Bedroom Gunung Salak -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="kamar">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_3_1899.jpg') }}" alt="Suite Master Bedroom Gunung Salak" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            KAMAR & VILA PRIVASI
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Suite Master Bedroom Gunung Salak</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Bukaan kaca panorama lantai-ke-plafon menghadap megahnya siluet fajar Gunung Salak dengan lantai kayu jati solid.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">King Size Master</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">85 m²</span>
                        </div>
                    </div>
                </div>

                <!-- 2. Infinity Heated Pool Senja -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="rekreasi">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_5_1932.jpg') }}" alt="Infinity Heated Pool Senja" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-pine-900/90 backdrop-blur-xs text-gold-300 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            SENSASI AIR HANGAT
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Infinity Heated Pool Senja</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Air hangat berkonsep infinity meluapkan ketenangan dramatis dengan cerminan awan senja di atas ketinggian Cisarua.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">31°C Suhu Konstan</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Kedalaman 1.2m</span>
                        </div>
                    </div>
                </div>

                <!-- 3. Nasi Liwet Sunda Istimewa -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="kuliner">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_7_1964.jpg') }}" alt="Nasi Liwet Sunda Istimewa" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-amber-900/90 backdrop-blur-xs text-amber-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            BUMI PARAHYANGAN RESTAURANT
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Nasi Liwet Sunda Istimewa</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Racikan rempah otentik Pasundan disajikan dalam kuali tembikar tradisional dengan lalapan organik segar hasil panen botani lokal.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Buffet & À La Carte</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Organik Pasundan</span>
                        </div>
                    </div>
                </div>

                <!-- 4. Lotus Spa Paviliun Riverside -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="rekreasi">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_9_2089.jpg') }}" alt="Lotus Spa Paviliun Riverside" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-emerald-900/90 backdrop-blur-xs text-emerald-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            RELAKSASI RAGA
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Lotus Spa Paviliun Riverside</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Terapi aromaterapi alami diiringi gemercik arus sungai bebatuan alami Cisarua di paviliun semi-terbuka bernuansa bambu.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Herbal Botanical Oils</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Riverfront</span>
                        </div>
                    </div>
                </div>

                <!-- 5. Jalur Kabut Pinus & Anggrek Liar -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="lanskap">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_10_2095.jpg') }}" alt="Jalur Kabut Pinus & Anggrek Liar" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-pine-950/80 backdrop-blur-xs text-stone-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            SUAKA ALAMI
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Jalur Kabut Pinus & Anggrek Liar</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Jelajahi jalan setapak batu andesit di bawah naungan ratusan pinus merkusii dengan hembusan udara murni pegunungan.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">1.8 Km Jogging Track</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Spesies Langka</span>
                        </div>
                    </div>
                </div>

                <!-- 6. Grand Ballroom Resepsi Malam -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="mice">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_4_1905.jpg') }}" alt="Grand Ballroom Resepsi Malam" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-purple-900/90 backdrop-blur-xs text-purple-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            BALLROOM MEGAH
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Grand Ballroom Resepsi Malam</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Ruang perjamuan akbar tanpa pilar dengan tata lampu kristal megah, mengakomodasi hingga 1.000 tamu istimewa Anda.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Kapasitas 1,000 Pax</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Pillarless 8m Ceiling</span>
                        </div>
                    </div>
                </div>

                <!-- 7. Presidential Villa Sundeck -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="kamar">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_6_1938.jpg') }}" alt="Presidential Villa Sundeck" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-gold-900/90 backdrop-blur-xs text-gold-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            KEMEWAHAN PUNCAK
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Presidential Villa Sundeck</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Kolam renang pribadi bersuhu terkontrol dengan pemandangan tanpa batas ke lembah hijau Cisarua nan sakral.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Private Pool</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">240 m² Villa</span>
                        </div>
                    </div>
                </div>

                <!-- 8. Morning Sunrise Yoga di Bukit Anggrek Deck -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="lanskap">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_8_1970.jpg') }}" alt="Morning Sunrise Yoga" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-pine-900/90 backdrop-blur-xs text-gold-300 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            BUKIT ANGGREK DECK
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Morning Sunrise Yoga</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Menyambut energi matahari pagi di atas lautan awan dengan bimbingan instruktur yoga bersertifikasi internasional.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Sesi Pagi 06:30</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">All Levels</span>
                        </div>
                    </div>
                </div>

                <!-- 9. Dek Santap Malam Romantis -->
                <div class="gallery-item group bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300" data-category="kuliner">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/resort/p3_43_2188.jpg') }}" alt="Dek Santap Malam Romantis" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 bg-red-950/80 backdrop-blur-xs text-rose-200 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            INTIMATE GASTRONOMY
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <h3 class="font-serif text-lg font-bold text-pine-900">Dek Santap Malam Romantis</h3>
                        </div>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Pengalaman makan malam 5-course di bawah taburan gemintang dan cahaya lentera lilin hangat di dek gantung resor.
                        </p>
                        <div class="flex gap-2">
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">Private Butler</span>
                            <span class="px-2.5 py-1 rounded bg-stone-200/80 text-[10px] font-bold text-stone-700">5-Course Menu</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SINEMATIK VIRTUAL TOUR 4K (Page 3 in PDF) -->
    <section class="py-24 bg-pine-950 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-pine-900 rounded-3xl overflow-hidden border border-gold-500/30 shadow-2xl grid grid-cols-1 lg:grid-cols-12">
                
                <div class="lg:col-span-7 relative h-80 lg:h-auto overflow-hidden">
                    <img src="{{ asset('images/resort/p3_39_2137.jpg') }}" alt="Sinematik Virtual Tour 4K" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                        <button type="button" class="w-16 h-16 rounded-full bg-gold-500 text-pine-950 flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300">
                            <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-5 p-8 sm:p-12 space-y-6">
                    <div>
                        <span class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] block mb-2">
                            SINEMATIK VIRTUAL TOUR 4K
                        </span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-bold text-white mb-3">
                            Eksplorasi Lengkap Lingkungan Resor Dari Layar Anda
                        </h2>
                        <p class="text-stone-300 text-xs leading-relaxed">
                            Saksikan megahnya arsitektur lanskap terbuka, suara riak sungai, dan semilir kabut dataran tinggi dalam rekaman 360° beresolusi 4K dengan narasi spasial berdurasi 3 menit.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-2 text-xs">
                        <div class="p-3 rounded-lg bg-pine-950/80 border border-emerald-800/40">
                            <span class="text-[10px] text-stone-400 block">Durasi Pemutaran</span>
                            <span class="font-bold text-gold-400">03:24 Menit</span>
                        </div>
                        <div class="p-3 rounded-lg bg-pine-950/80 border border-emerald-800/40">
                            <span class="text-[10px] text-stone-400 block">Resolusi Master</span>
                            <span class="font-bold text-gold-400">Ultra HD 60fps</span>
                        </div>
                    </div>

                    <!-- Chapters Timeline -->
                    <div class="space-y-2 pt-2 text-xs">
                        <div class="flex justify-between items-center text-stone-300 border-b border-emerald-900/60 pb-1.5">
                            <span>00:45 Presidential Suite</span>
                            <span class="text-gold-400">360° View</span>
                        </div>
                        <div class="flex justify-between items-center text-stone-300 border-b border-emerald-900/60 pb-1.5">
                            <span>01:30 Infinity Ridge Pool</span>
                            <span class="text-gold-400">360° View</span>
                        </div>
                        <div class="flex justify-between items-center text-stone-300 border-b border-emerald-900/60 pb-1.5">
                            <span>02:15 Lotus Riverside Spa</span>
                            <span class="text-gold-400">360° View</span>
                        </div>
                        <div class="flex justify-between items-center text-stone-300">
                            <span>02:50 Bumi Parahyangan</span>
                            <span class="text-gold-400">360° View</span>
                        </div>
                    </div>

                    <div>
                        <a href="{{ url('/kontak') }}" class="w-full block text-center py-3.5 px-6 rounded-xl bg-gold-500 hover:bg-gold-400 text-pine-950 font-bold text-xs uppercase tracking-wider transition shadow-lg">
                            Mulai Pengalaman 360° Interaktif
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- KOMUNITAS INSTAGRAM & CTA (Page 3 in PDF) -->
    <section class="py-24 bg-white border-b border-stone-200 text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                KOMUNITAS INSTAGRAM RESORT
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">
                Bagikan Sudut Favorit Anda di Suaka Kami
            </h2>
            <p class="text-stone-600 text-sm leading-relaxed mb-6">
                Setiap sudut Grand Bogor Resort memiliki cerita kedamaian tersendiri. Sematkan tagar kurasi kami pada unggahan Instagram Anda untuk berkesempatan ditampilkan di papan apresiasi visual resmi kami:
            </p>
            <div class="flex flex-wrap justify-center gap-3 text-xs font-bold text-pine-900 mb-8">
                <span class="px-4 py-2 rounded-full bg-stone-100 border border-stone-200">#GrandBogorSanctuary</span>
                <span class="px-4 py-2 rounded-full bg-stone-100 border border-stone-200">#LuxuryInNature</span>
                <span class="px-4 py-2 rounded-full bg-stone-100 border border-stone-200">#PuncakHighlandEscape</span>
            </div>
            <p class="text-xs text-stone-500 mb-12">
                <strong>GBRS VIP +2.4k</strong> Lebih dari 2.400+ foto telah dibagikan oleh para tamu terhormat.
            </p>

            <!-- Bottom CTA -->
            <div class="p-8 sm:p-12 rounded-3xl bg-stone-50 border border-stone-200 text-center">
                <span class="text-[11px] font-bold text-gold-600 uppercase tracking-widest block mb-2">WUJUDKAN MOMEN NYATA</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-pine-900 mb-4">
                    Siap Menikmati Suasana Ini Secara Langsung?
                </h3>
                <p class="text-xs sm:text-sm text-stone-600 max-w-xl mx-auto mb-8">
                    Reservasi kamar impian Anda sekarang dan dapatkan keuntungan sarapan gratis di Bumi Parahyangan serta complimentary treatment 30 menit di Lotus Spa.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ url('/kontak#reservasi') }}" class="px-8 py-3.5 rounded-xl bg-pine-900 hover:bg-pine-850 text-gold-300 hover:text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        Reservasi Kamar & Vila
                    </a>
                    <a href="https://wa.me/628118900777" target="_blank" class="px-8 py-3.5 rounded-xl border border-pine-900 text-pine-900 hover:bg-pine-900 hover:text-white font-bold text-xs uppercase tracking-wider transition">
                        Hubungi Concierge Resor
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple Filter Script -->
    <script>
        function filterGallery(category) {
            // Update button styles
            const buttons = document.querySelectorAll('.gallery-tab-btn');
            buttons.forEach(btn => {
                if (btn.getAttribute('data-filter') === category) {
                    btn.className = 'gallery-tab-btn active px-4 py-2 rounded-full text-xs font-bold transition bg-pine-900 text-gold-300 border border-gold-500/40';
                } else {
                    btn.className = 'gallery-tab-btn px-4 py-2 rounded-full text-xs font-semibold transition bg-stone-100 text-stone-700 hover:bg-stone-200 border border-transparent';
                }
            });

            // Filter items
            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>

@endsection

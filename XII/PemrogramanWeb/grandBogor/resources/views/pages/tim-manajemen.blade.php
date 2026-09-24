@extends('layouts.resort')

@section('title', 'Tim Manajemen & Dewan Eksekutif | Grand Bogor Resort')

@section('content')

    <!-- HERO HEADER (Page 4 in PDF) -->
    <section class="relative py-20 bg-pine-950 text-white overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-25">
            <img src="{{ asset('images/resort/p4_0_2427.jpg') }}" alt="Dewan Kepemimpinan Resor" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-pine-950 via-pine-900/90 to-pine-950"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-900/60 border border-gold-500/40 text-gold-300 text-xs tracking-[0.2em] uppercase font-semibold mb-6 shadow-md backdrop-blur-xs">
                DEWAN KEPEMIMPINAN & EKSEKUTIF
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold tracking-tight text-white max-w-4xl mx-auto mb-6 leading-tight">
                Dedikasi Para Profesional di Balik Senyuman Anda
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-3xl mx-auto font-light leading-relaxed mb-12">
                Dipimpin oleh para pakar industri perhotelan internasional dengan pengalaman puluhan tahun, berkomitmen menghadirkan standar kenyamanan tertinggi dengan ketulusan hati dan kearifan bumi Parahyangan.
            </p>

            <div class="flex flex-wrap justify-center items-center gap-6 text-xs uppercase tracking-wider">
                <div class="bg-black/40 backdrop-blur-md px-6 py-2.5 rounded-xl border border-white/10">
                    <span class="text-gold-400 font-bold block text-sm">140+</span>
                    <span class="text-stone-400 text-[10px]">STAF TERSERTIFIKASI</span>
                </div>
                <div class="bg-black/40 backdrop-blur-md px-6 py-2.5 rounded-xl border border-white/10">
                    <span class="text-gold-400 font-bold block text-sm">25+ Th</span>
                    <span class="text-stone-400 text-[10px]">REPUTASI LUHUR</span>
                </div>
            </div>
        </div>
    </section>

    <!-- PESAN & FILOSOFI KERAMAHAN GM (Page 4 in PDF) -->
    <section class="py-24 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-stone-50 rounded-3xl p-8 sm:p-14 border border-stone-200 shadow-xs grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left GM Photo & Credentials -->
                <div class="lg:col-span-4 text-center">
                    <div class="relative inline-block mb-6">
                        <img src="{{ asset('images/resort/p4_8_2391.jpg') }}" alt="Raden Arya Wicaksono, CHA" class="w-64 h-80 object-cover rounded-2xl shadow-xl mx-auto border-2 border-gold-500/40">
                        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 bg-pine-900 text-gold-300 text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-wider shadow-md whitespace-nowrap border border-gold-500/30">
                            Komitmen Pelayanan Prima 24/7
                        </div>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-pine-900 mb-1">Raden Arya Wicaksono, CHA</h3>
                    <p class="text-xs font-semibold text-gold-600 uppercase tracking-wider mb-2">GENERAL MANAGER & CURATOR</p>
                    <span class="text-[11px] text-stone-500 block">22+ Tahun Pengalaman Karir Global</span>
                    <span class="text-[10px] text-stone-400 block mt-1">Certified Hotel Administrator (AHLEI USA)</span>
                </div>

                <!-- Right GM Philosophical Message -->
                <div class="lg:col-span-8 space-y-6">
                    <div>
                        <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                            PESAN & FILOSOFI KERAMAHAN
                        </span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-bold text-pine-900">
                            Harmoni Kearifan Lokal Sunda & Ketelitian Standar Dunia
                        </h2>
                    </div>

                    <blockquote class="font-serif text-base sm:text-lg text-pine-950 italic leading-relaxed border-l-4 border-gold-500 pl-4 py-1">
                        "Bagi kami di Grand Bogor Resort, keramahan bukanlah sekadar prosedur operasional formal, melainkan pengejawantahan dari filosofi leluhur Parahyangan: 'Someah Hade ka Semoh'—menyambut setiap tetamu selayaknya kerabat terhormat dengan kehangatan tulus dari relung sanubari."
                    </blockquote>

                    <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                        "Kami memadukan kemurnian suaka botanikal Gunung Gede-Pangrango dengan tata kelola manajemen mutakhir berpredikat Certified Hotel Administrator (CHA). Setiap detail—mulai dari embun pagi di balkon kamar Anda hingga sajian adiluhung meja makan malam—diciptakan dengan dedikasi penuh ketenangan pikiran."
                    </p>

                    <div class="pt-4 flex items-center gap-4">
                        <div class="w-12 h-1 bg-gold-500"></div>
                        <span class="font-serif text-sm font-bold text-pine-900 italic">Raden Arya Wicaksono</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PILAR OPERASIONAL: DEWAN EKSEKUTIF RESOR (6 Profiles from Page 4 PDF) -->
    <section class="py-24 bg-stone-100/70 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                    PILAR OPERASIONAL
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">
                    Dewan Eksekutif Resor
                </h2>
                <p class="text-stone-600 text-sm leading-relaxed">
                    Profil para pemimpin divisi yang menjaga keanggunan, keamanan, dan presisi di setiap jengkal fasilitas Grand Bogor.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- 1. Raden Arya Wicaksono -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-64 overflow-hidden bg-stone-200">
                        <img src="{{ asset('images/resort/p4_8_2391.jpg') }}" alt="Raden Arya Wicaksono, CHA" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gold-600 uppercase tracking-wider block mb-1">GENERAL MANAGER</span>
                            <h3 class="font-serif text-xl font-bold text-pine-900 mb-1">Raden Arya Wicaksono, CHA</h3>
                            <span class="text-[11px] text-stone-500 block mb-4">22+ Th Resor Mewah (Bali, Swiss & Bogor)</span>
                            <p class="text-stone-600 text-xs italic leading-relaxed mb-4">
                                "Kenyamanan sejati tercipta manakala kebutuhan tamu terpenuhi sebelum terucap oleh kata-kata."
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 text-[11px] text-stone-500">
                            <strong>Sertifikasi:</strong> CHA AHLEI, ISO 9001
                        </div>
                    </div>
                </div>

                <!-- 2. Chef Junaidi Hartono -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-64 overflow-hidden bg-stone-200">
                        <img src="{{ asset('images/resort/p4_3_2498.jpg') }}" alt="Chef Junaidi Hartono" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gold-600 uppercase tracking-wider block mb-1">EXECUTIVE CHEF</span>
                            <h3 class="font-serif text-xl font-bold text-pine-900 mb-1">Chef Junaidi Hartono</h3>
                            <span class="text-[11px] text-stone-500 block mb-4">18+ Th Kuliner Kontemporer & Gastronomi Prancis</span>
                            <p class="text-stone-600 text-xs italic leading-relaxed mb-4">
                                "Kami mengangkat herba organik pegunungan Bogor ke level santapan aristokrat berkelas global."
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 text-[11px] text-stone-500">
                            <strong>Penghargaan:</strong> Asian Culinary Cup Winner
                        </div>
                    </div>
                </div>

                <!-- 3. Melissa Anggraini -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-64 overflow-hidden bg-stone-200">
                        <img src="{{ asset('images/resort/p4_12_2442.jpg') }}" alt="Melissa Anggraini, B.Sc." class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gold-600 uppercase tracking-wider block mb-1">DIRECTOR OF GUEST RELATIONS</span>
                            <h3 class="font-serif text-xl font-bold text-pine-900 mb-1">Melissa Anggraini, B.Sc.</h3>
                            <span class="text-[11px] text-stone-500 block mb-4">Les Clefs d'Or International Member</span>
                            <p class="text-stone-600 text-xs italic leading-relaxed mb-4">
                                "Setiap perjalanan memiliki cerita unik; peran kami adalah memastikan kenangan Anda di Bogor tertulis sempurna."
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 text-[11px] text-stone-500">
                            <strong>Keahlian:</strong> VIP Protocol & Itinerary Bespoke
                        </div>
                    </div>
                </div>

                <!-- 4. Bambang Triatmojo -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-64 overflow-hidden bg-stone-200">
                        <img src="{{ asset('images/resort/p4_13_2461.jpg') }}" alt="Bambang Triatmojo" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gold-600 uppercase tracking-wider block mb-1">OPERATIONS & FACILITIES DIRECTOR</span>
                            <h3 class="font-serif text-xl font-bold text-pine-900 mb-1">Bambang Triatmojo</h3>
                            <span class="text-[11px] text-stone-500 block mb-4">16+ Th Manajemen Cagar & Rekayasa Hijau</span>
                            <p class="text-stone-600 text-xs italic leading-relaxed mb-4">
                                "Merawat 15 hektar suaka botani membutuhkan presisi rekayasa modern tanpa mengganggu ekosistem satwa alam."
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 text-[11px] text-stone-500">
                            <strong>Sertifikasi:</strong> Green Building Council & HSE
                        </div>
                    </div>
                </div>

                <!-- 5. Siti Nurhaliza -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-64 overflow-hidden bg-stone-200">
                        <img src="{{ asset('images/resort/p4_22_2547.jpg') }}" alt="Siti Nurhaliza, SKM" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gold-600 uppercase tracking-wider block mb-1">HEAD OF SPA, WELLNESS & HYGIENE</span>
                            <h3 class="font-serif text-xl font-bold text-pine-900 mb-1">Siti Nurhaliza, SKM</h3>
                            <span class="text-[11px] text-stone-500 block mb-4">Certified Asian Spa Practitioner & Auditor CHSE</span>
                            <p class="text-stone-600 text-xs italic leading-relaxed mb-4">
                                "Kebugaran hakiki mengalir dari ketenangan batin, sentuhan aromaterapi alami, dan higienitas tanpa kompromi."
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 text-[11px] text-stone-500">
                            <strong>Sertifikasi:</strong> CHSE Lead Assessor & CIBTAC
                        </div>
                    </div>
                </div>

                <!-- 6. Hendra Kurniawan -->
                <div class="bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-64 overflow-hidden bg-stone-200">
                        <img src="{{ asset('images/resort/p4_24_2565.jpg') }}" alt="Hendra Kurniawan" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gold-600 uppercase tracking-wider block mb-1">EXECUTIVE HOUSEKEEPING SUPERVISOR</span>
                            <h3 class="font-serif text-xl font-bold text-pine-900 mb-1">Hendra Kurniawan</h3>
                            <span class="text-[11px] text-stone-500 block mb-4">14+ Th Standar Audit Sanitasi Bintang 5</span>
                            <p class="text-stone-600 text-xs italic leading-relaxed mb-4">
                                "Kebersihan sempurna adalah kemewahan tak terlihat yang langsung Anda rasakan sejak tarikan napas pertama."
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 text-[11px] text-stone-500">
                            <strong>Standar:</strong> HEPA Hospital-Grade Disinfection
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- INTEGRITAS PELAYANAN & BUDAYA KERJA (Page 4 in PDF) -->
    <section class="py-24 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                    INTEGRITAS PELAYANAN
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">
                    Budaya Kerja & Standar Pelatihan Terpadu
                </h2>
                <p class="text-stone-600 text-sm leading-relaxed">
                    Setiap insan Grand Bogor Resort melalui tahapan pembekalan berkelanjutan guna menjaga integritas etika dan ketepatan tindakan di setiap momen interaksi tamu.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-2">HOSPITALITAS DARI HATI</span>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Menghayati ketulusan budaya Sunda tanpa formalitas yang kaku. Seluruh tim dilatih untuk peka membaca preferensi personal tamu secara empati dan bersahaja.
                    </p>
                    <span class="text-[11px] font-bold text-pine-900">Modul Empati Pelayanan Bintang 5</span>
                </div>

                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-2">SERTIFIKASI BERKELANJUTAN</span>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Program 120 jam pelatihan per staf setiap tahun, mencakup standar keselamatan pangan HACCP, protokol concierge internasional, dan konservasi alam hayati.
                    </p>
                    <span class="text-[11px] font-bold text-pine-900">Kerjasama Lembaga Sertifikasi Swiss</span>
                </div>

                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-2">CHSE & KEAMANAN 24 JAM</span>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Pengawasan kebersihan harian dengan sertifikasi CHSE paripurna, didukung tim medis on-call 24 jam serta personel keselamatan tanggap darurat dataran tinggi.
                    </p>
                    <span class="text-[11px] font-bold text-emerald-700">Skor CHSE Kemenparekraf 100%</span>
                </div>
            </div>

            <!-- Apresiasi Prestasi 2024 -->
            <div class="bg-pine-900 text-white p-8 sm:p-12 rounded-3xl text-center max-w-4xl mx-auto border border-gold-500/30">
                <span class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] block mb-2">APRESIASI PRESTASI 2024</span>
                <h3 class="font-serif text-2xl font-bold mb-3">Pemenang "Best Hospitality Team West Java 2024"</h3>
                <p class="text-stone-300 text-xs sm:text-sm max-w-2xl mx-auto leading-relaxed mb-8">
                    Dianugerahi oleh Asosiasi Pariwisata & Perhotelan Indonesia atas konsistensi mempertahankan indeks kepuasan tamu sebesar 98.6% serta dedikasi pelestarian lingkungan resor.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ url('/kontak#reservasi') }}" class="px-8 py-3.5 rounded-xl bg-gold-500 hover:bg-gold-400 text-pine-950 font-bold text-xs uppercase tracking-wider transition shadow-md">
                        Nikmati Layanan Kami
                    </a>
                    <a href="https://wa.me/628118900777" target="_blank" class="px-8 py-3.5 rounded-xl border border-gold-500/50 text-gold-300 hover:bg-gold-500 hover:text-pine-950 font-bold text-xs uppercase tracking-wider transition">
                        Hubungi Concierge
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

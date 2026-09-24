@extends('layouts.resort')

@section('title', 'Tentang Kami — Suaka Botanikal Parahyangan | Grand Bogor Resort')

@section('content')

    <!-- HERO HEADER (Page 2 in PDF) -->
    <section class="relative py-20 bg-pine-950 text-white overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-25">
            <img src="{{ asset('images/resort/p2_41_1488.jpg') }}" alt="Suaka Botanikal Parahyangan" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-pine-950 via-pine-900/90 to-pine-950"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-900/60 border border-gold-500/40 text-gold-300 text-xs tracking-[0.2em] uppercase font-semibold mb-6 shadow-md backdrop-blur-xs">
                TENTANG KAMI — SUAKA BOTANIKAL PARAHYANGAN
            </div>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold tracking-tight text-white max-w-4xl mx-auto mb-6 leading-tight">
                Warisan Keasrian Tanah Parahyangan Berpadu Kemewahan Modern
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-3xl mx-auto font-light leading-relaxed mb-12">
                Menelusuri kisah dedikasi kami dalam merawat keasrian alam Puncak Bogor sejak 1998, menghadirkan tempat jeda yang menenangkan raga dan jiwa.
            </p>

            <!-- 4 Metrics Bar (Authentic from Page 2 PDF) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">
                <div class="bg-pine-900/80 backdrop-blur-sm p-6 rounded-2xl border border-emerald-800/40 text-left">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider">WARISAN SEJARAH</span>
                    <span class="font-serif text-3xl font-bold text-gold-400 block my-1">25+</span>
                    <p class="text-xs text-stone-300">Tahun Melayani dengan Keanggunan Klasik</p>
                </div>
                <div class="bg-pine-900/80 backdrop-blur-sm p-6 rounded-2xl border border-emerald-800/40 text-left">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider">KAWASAN TERPROTEKSI</span>
                    <span class="font-serif text-3xl font-bold text-gold-400 block my-1">12 Ha</span>
                    <p class="text-xs text-stone-300">Cagar Botani, Hutan Pinus & Mata Air Alami</p>
                </div>
                <div class="bg-pine-900/80 backdrop-blur-sm p-6 rounded-2xl border border-emerald-800/40 text-left">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider">AKOMODASI TERKURASI</span>
                    <span class="font-serif text-3xl font-bold text-gold-400 block my-1">48</span>
                    <p class="text-xs text-stone-300">Kamar Suite & Villa Kolam Pribadi Eksklusif</p>
                </div>
                <div class="bg-pine-900/80 backdrop-blur-sm p-6 rounded-2xl border border-emerald-800/40 text-left">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider">REPUTASI KEUNGGULAN</span>
                    <span class="font-serif text-3xl font-bold text-gold-400 block my-1">98.8%</span>
                    <p class="text-xs text-stone-300">Indeks Kepuasan & Loyalitas Tamu Internasional</p>
                </div>
            </div>
        </div>
    </section>

    <!-- KISAH PENGABDIAN DUA DEKADE (Page 2 in PDF) -->
    <section class="py-24 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Story Content -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-stone-100 border border-stone-300 text-stone-700 text-xs font-bold tracking-wider">
                        <span>ARSIP BERSEJARAH • 1998</span>
                    </div>
                    <blockquote class="font-serif text-lg sm:text-xl text-pine-900 italic border-l-4 border-gold-500 pl-4">
                        "Bermula dari kecintaan pada semerbak daun teh basah dan ketenangan hutan pinus keluarga di lembah Cisarua."
                    </blockquote>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-pine-900">
                        Dari Perkebunan Konservasi Teh Menuju Resor Botani Terdepan Nusantara
                    </h2>
                    <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                        Pada tahun 1998, Grand Bogor Resort bermula sebagai suaka privat keluarga yang didedikasikan untuk merehabilitasi lereng bukit Cisarua yang sempat terdegradasi. Berbekal komitmen pelestarian ekosistem dataran tinggi, kami menanam lebih dari 4.000 bibit pinus merkusii serta mempertahankan varietas teh pusaka Sunda tanpa pestisida kimia.
                    </p>
                    <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                        Seiring berjalannya waktu, kerinduan para sahabat akan udara murni dan gemercik mata air alami mendorong transformasi lahan ini menjadi peristirahatan terpadu. Kini, lanskap 12 hektar tersebut menjelma sebagai perpaduan harmonis antara cagar hayati yang dilindungi dan vila berkelas internasional, menawarkan privasi mutlak bagi tamu yang mendambakan ketenangan sejati tanpa kompromi pada kenyamanan modern.
                    </p>

                    <div class="p-5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs">
                        <strong class="block mb-1 font-bold text-emerald-950">Komitmen Terbuka Ekosistem Cisarua</strong>
                        Setiap reservasi berkontribusi langsung pada program reboisasi lereng Gunung Gede Pangrango bersama kelompok tani hutan binaan kami.
                    </div>
                </div>

                <!-- Right Images Grid -->
                <div class="lg:col-span-6 grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <img src="{{ asset('images/resort/p2_10_1125.jpg') }}" alt="Arsip Bersejarah 1998" class="rounded-2xl shadow-md object-cover h-64 w-full">
                        <img src="{{ asset('images/resort/p2_43_1510.jpg') }}" alt="Arsitektur Botani" class="rounded-2xl shadow-md object-cover h-48 w-full">
                    </div>
                    <div class="pt-8 space-y-4">
                        <img src="{{ asset('images/resort/p2_42_1500.jpg') }}" alt="Lanskap Suaka" class="rounded-2xl shadow-md object-cover h-80 w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI KEBERLANJUTAN (Page 2 in PDF) -->
    <section class="py-24 bg-stone-50 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                    KOMPAS ARAH & KOMITMEN
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-6">
                    Visi & Misi Keberlanjutan
                </h2>

                <!-- Grand Vision Card -->
                <div class="bg-pine-900 text-white p-8 sm:p-10 rounded-3xl border border-gold-500/40 shadow-xl text-center">
                    <span class="text-gold-400 text-[11px] font-bold uppercase tracking-[0.2em] block mb-2">VISI AGUNG KAMI</span>
                    <blockquote class="font-serif text-xl sm:text-2xl font-bold text-white leading-relaxed">
                        “Menjadi destinasi peristirahatan mewah berbasis kelestarian lingkungan dan budaya terbaik di Asia Tenggara.”
                    </blockquote>
                </div>
            </div>

            <!-- 4 Missions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Misi I -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs flex flex-col justify-between">
                    <div>
                        <span class="text-gold-600 text-[11px] font-bold uppercase tracking-wider block mb-1">MISI I</span>
                        <h3 class="font-serif text-lg font-bold text-pine-900 mb-2">Konservasi Alam Berkelanjutan</h3>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Memelihara cagar botani 12 hektar, menjaga resapan air pegunungan alami, serta memastikan zero-waste to landfill secara konsisten.
                        </p>
                    </div>
                    <span class="inline-block px-3 py-1 rounded bg-emerald-50 text-emerald-800 text-[10px] font-bold uppercase tracking-wider self-start">
                        Harmoni Ekologi
                    </span>
                </div>

                <!-- Misi II -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs flex flex-col justify-between">
                    <div>
                        <span class="text-gold-600 text-[11px] font-bold uppercase tracking-wider block mb-1">MISI II</span>
                        <h3 class="font-serif text-lg font-bold text-pine-900 mb-2">Pelestarian Kuliner & Budaya Sunda</h3>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Mengangkat heritage gastronomi Pasundan melalui santapan adiboga berbahan panen organik lokal serta ornamen arsitektur bambu kontemporer.
                        </p>
                    </div>
                    <span class="inline-block px-3 py-1 rounded bg-amber-50 text-amber-800 text-[10px] font-bold uppercase tracking-wider self-start">
                        Kearifan Lokal
                    </span>
                </div>

                <!-- Misi III -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs flex flex-col justify-between">
                    <div>
                        <span class="text-gold-600 text-[11px] font-bold uppercase tracking-wider block mb-1">MISI III</span>
                        <h3 class="font-serif text-lg font-bold text-pine-900 mb-2">Hospitalitas Standar Dunia</h3>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Menerapkan kurikulum butler Swiss hospitality yang presisi, menjamin privasi absolut, intuisi layanan hangat, dan keanggunan tanpa cela.
                        </p>
                    </div>
                    <span class="inline-block px-3 py-1 rounded bg-blue-50 text-blue-800 text-[10px] font-bold uppercase tracking-wider self-start">
                        Standar Global
                    </span>
                </div>

                <!-- Misi IV -->
                <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-xs flex flex-col justify-between">
                    <div>
                        <span class="text-gold-600 text-[11px] font-bold uppercase tracking-wider block mb-1">MISI IV</span>
                        <h3 class="font-serif text-lg font-bold text-pine-900 mb-2">Pemberdayaan Komunitas Cisarua</h3>
                        <p class="text-stone-600 text-xs leading-relaxed mb-4">
                            Merekrut dan membina lebih dari 85% talenta dari warga lingkar Bogor, serta mengintegrasikan produk kerajinan dan madu hutan masyarakat.
                        </p>
                    </div>
                    <span class="inline-block px-3 py-1 rounded bg-purple-50 text-purple-800 text-[10px] font-bold uppercase tracking-wider self-start">
                        Inklusivitas Berdaya
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- NILAI-NILAI INTI (Core Values from Page 2 PDF) -->
    <section class="py-24 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                    PONDASI PRINSIP KAMI
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">
                    Nilai-Nilai Inti yang Menjiwai Setiap Pelayanan
                </h2>
                <p class="text-stone-600 text-sm leading-relaxed">
                    Di setiap sapaan hangat dan gemerisik daun pinus, tersirat nilai luhur yang dirawat dengan ketulusan hati.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Value 1 -->
                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-1">FILOSOFI PARAHYANGAN</span>
                    <h3 class="font-serif text-2xl font-bold text-pine-900 mb-2">Soméah Hade ka Sémah</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Menghormati tamu layaknya keluarga agung dengan ketulusan senyum dan adab kesundaan yang halus. Setiap interaksi dipenuhi kerendahan hati, menghadirkan rasa hangat yang akrab namun tetap menjaga kesopanan tertinggi.
                    </p>
                    <span class="text-[11px] font-bold text-pine-900">Hospitalitas Berbasis Jiwa & Adab</span>
                </div>

                <!-- Value 2 -->
                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-1">TANGGUNG JAWAB ALAM</span>
                    <h3 class="font-serif text-2xl font-bold text-pine-900 mb-2">Kelestarian Ekologis Aktif</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Bukan sekadar slogan; kami memberlakukan zero single-use plastic, mengoperasikan panel surya seluas 800 meter persegi untuk efisiensi energi bersih, serta menjadwalkan program penanaman pohon berkala di setiap kuartal.
                    </p>
                    <span class="text-[11px] font-bold text-emerald-800">100% Bebas Plastik Sekali Pakai</span>
                </div>

                <!-- Value 3 -->
                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-1">KENYAMANAN AKUSTIK</span>
                    <h3 class="font-serif text-2xl font-bold text-pine-900 mb-2">Privasi & Ketenangan Mutlak</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Vila-vila dirancang mengikuti kontur alami lereng bukit dengan peredam suara organik vegetasi rimbun. Hanya bisikan angin pegunungan, siulan burung endemik, dan gemericik air yang menyapa telinga Anda.
                    </p>
                    <span class="text-[11px] font-bold text-pine-900">Zona Suaka Hening Terpadu</span>
                </div>

                <!-- Value 4 -->
                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-200">
                    <span class="text-gold-600 text-xs font-bold uppercase tracking-wider block mb-1">PENDIDIKAN LAYANAN</span>
                    <h3 class="font-serif text-2xl font-bold text-pine-900 mb-2">Keunggulan Pelayanan Bintang Lima</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Seluruh staf dan tim butler menjalani pelatihan berkala berstandar akademi perhotelan Swiss. Kami mengantisipasi kebutuhan tamu sebelum diucapkan, memberikan ketenangan tanpa cela di setiap detik Anda bermukim.
                    </p>
                    <span class="text-[11px] font-bold text-gold-700">Butler Bersertifikat Internasional</span>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN EKSKLUSIF & SERTIFIKASI (Page 2 in PDF) -->
    <section class="py-24 bg-stone-100/80 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] font-bold text-gold-600 block mb-2">
                    KEKUATAN ALAMI & INFRASTRUKTUR
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">
                    Keunggulan Eksklusif Grand Bogor Resort
                </h2>
                <p class="text-stone-600 text-sm leading-relaxed">
                    Kekayaan mikroklimat dataran tinggi dipadu teknologi filtrasi higienis termutakhir.
                </p>
            </div>

            <!-- 3 Infrastructure Highlights -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider mb-1">KUALITAS OKSIGEN TINGGI</span>
                    <h3 class="font-serif text-xl font-bold text-pine-900 mb-2">Elevasi 1.150 mdpl Bebas Polusi</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Terletak jauh di atas batas kabut asap perkotaan, menghasilkan Indeks Standar Pencemar Udara (ISPU) konsisten di bawah angka 15 AQI, meremajakan sistem pernapasan dan kualitas tidur secara alami.
                    </p>
                    <span class="text-[11px] font-bold text-emerald-700">Suhu Rata-rata Harian: 17°C - 23°C Sejuk Nyaman</span>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider mb-1">MATA AIR ALAMI TERPADU</span>
                    <h3 class="font-serif text-xl font-bold text-pine-900 mb-2">Filtrasi Ganda ke Tiap Unit Vila</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Seluruh air sanitasi, kolam berendam hangat, dan kolam renang privat dipasok langsung dari mata air purba Gunung Gede yang melalui sistem pemurnian ultrafiltrasi tanpa bau kaporit yang menyengat.
                    </p>
                    <span class="text-[11px] font-bold text-emerald-700">Kadar Mineral Alami: pH Seimbang 7.6 Lembut di Kulit</span>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block tracking-wider mb-1">STANDARISASI KEAMANAN</span>
                    <h3 class="font-serif text-xl font-bold text-pine-900 mb-2">CHSE & Green Hotel Platinum</h3>
                    <p class="text-stone-600 text-xs leading-relaxed mb-4">
                        Telah lolos audit komprehensif Kementerian Pariwisata dan Ekonomi Kreatif RI serta badan penilai ekowisata internasional dengan predikat kepatuhan tertinggi untuk higienitas, kesehatan, dan kelestarian hayati.
                    </p>
                    <span class="text-[11px] font-bold text-emerald-700">Sertifikasi Audit: Skor 100% Sempurna Platinum</span>
                </div>
            </div>

            <!-- Awards Highlight (Page 2 in PDF) -->
            <div class="bg-pine-900 text-white p-8 sm:p-12 rounded-3xl border border-gold-500/30">
                <div class="text-center mb-8">
                    <span class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] block mb-1">PENGAKUAN REPUTASI</span>
                    <h3 class="font-serif text-2xl font-bold text-white">Sertifikasi & Penghargaan Bergengsi</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="p-4 rounded-xl bg-pine-850 border border-emerald-800/40">
                        <span class="font-serif text-2xl font-bold text-gold-400 block mb-1">2024</span>
                        <h4 class="font-serif text-sm font-bold text-white mb-1">Indonesia Tourism Hospitality Awards</h4>
                        <p class="text-xs text-stone-300">Pemenang Kategori: Best Luxury Eco-Resort Jawa Barat</p>
                    </div>
                    <div class="p-4 rounded-xl bg-pine-850 border border-emerald-800/40">
                        <span class="font-serif text-2xl font-bold text-gold-400 block mb-1">2023 - 2025</span>
                        <h4 class="font-serif text-sm font-bold text-white mb-1">ASEAN Green Hotel Standard</h4>
                        <p class="text-xs text-stone-300">Predikat Kehormatan: Platinum Sustainable Tourism</p>
                    </div>
                    <div class="p-4 rounded-xl bg-pine-850 border border-emerald-800/40">
                        <span class="font-serif text-2xl font-bold text-gold-400 block mb-1">2024</span>
                        <h4 class="font-serif text-sm font-bold text-white mb-1">Eco-Resort Excellence</h4>
                        <p class="text-xs text-stone-300">Sertifikasi Global: Zero-Emission Botanical Sanctuary</p>
                    </div>
                </div>
            </div>

            <!-- CTA Next Step -->
            <div class="text-center mt-16">
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-pine-900 mb-4">
                    Rasakan Harmoni Alam & Kenyamanan Bintang Lima Bersama Kami
                </h3>
                <p class="text-stone-600 text-xs sm:text-sm max-w-xl mx-auto mb-8">
                    Pintu suaka botanikal kami senantiasa terbuka untuk menyambut kedatangan Anda. Rencanakan peristirahatan eksklusif keluarga atau pertemuan khidmat Anda hari ini.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ url('/kontak#reservasi') }}" class="px-8 py-3.5 rounded-xl bg-pine-900 hover:bg-pine-850 text-gold-300 hover:text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        Reservasi Penginapan
                    </a>
                    <a href="https://wa.me/628118900777" target="_blank" class="px-8 py-3.5 rounded-xl border border-pine-900 text-pine-900 hover:bg-pine-900 hover:text-white font-bold text-xs uppercase tracking-wider transition">
                        Hubungi Concierge
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

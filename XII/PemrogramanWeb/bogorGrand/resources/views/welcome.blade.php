<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bogor Grand Hotel & Resort</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pine: {
                            800: '#0c3832',
                            900: '#072420',
                            950: '#041715',
                        },
                        gold: {
                            400: '#e5c065',
                            500: '#c89d46',
                            600: '#a57c28',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased">

    <!-- Top Announcement Bar -->
    <div class="bg-pine-950 text-stone-300 text-xs py-2 px-4 text-center border-b border-white/10">
        <span>Dapatkan Pengalaman Menginap Terbaik</span>
        <span class="mx-2">•</span>
        <a href="#kamar" class="text-gold-400 hover:underline font-semibold">Jelajahi Koleksi Kamar & Resort</a>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-pine-900 flex items-center justify-center text-gold-400 font-serif font-bold text-xl shadow-sm">
                    BG
                </div>
                <div>
                    <span class="block font-serif font-bold text-lg text-pine-900 tracking-wider">BOGOR GRAND</span>
                    <span class="block text-[10px] tracking-[0.25em] text-stone-500 font-medium uppercase">Hotel & Resort</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-stone-600">
                <a href="#hero" class="hover:text-pine-900 transition-colors">Beranda</a>
                <a href="#kamar" class="hover:text-pine-900 transition-colors">Pilihan Kamar</a>
                <a href="#tentang" class="hover:text-pine-900 transition-colors">Tentang Kami</a>
                <a href="#kontak" class="hover:text-pine-900 transition-colors">Kontak</a>
            </nav>

            <!-- Mobile Hamburger Button -->
            <button type="button" 
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" 
                    class="md:hidden p-2 rounded-lg text-stone-700 hover:text-pine-900 hover:bg-stone-100 transition-colors" 
                    aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-stone-200 bg-white px-4 py-3 space-y-1 shadow-lg">
            <a href="#hero" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block py-2 text-sm font-semibold text-stone-700 hover:text-pine-900 border-b border-stone-100">Beranda</a>
            <a href="#kamar" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block py-2 text-sm font-semibold text-stone-700 hover:text-pine-900 border-b border-stone-100">Pilihan Kamar</a>
            <a href="#tentang" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block py-2 text-sm font-semibold text-stone-700 hover:text-pine-900 border-b border-stone-100">Tentang Kami</a>
            <a href="#kontak" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block py-2 text-sm font-semibold text-stone-700 hover:text-pine-900">Kontak</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="relative min-h-[580px] lg:min-h-[640px] flex items-center bg-pine-950 text-white overflow-hidden">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-pine-950 via-pine-900/85 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-pine-950 via-transparent to-transparent z-10"></div>
        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80"
             alt="Grand Bogor Panorama"
             class="absolute inset-0 w-full h-full object-cover object-center opacity-45">

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-gold-400 text-xs tracking-widest uppercase font-semibold mb-6">
                    <span>✨ SUAKA BOTANIKAL DI LERENG GUNUNG SALAK</span>
                </div>

                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Harmoni Alam & Kemewahan Tradisi
                </h1>

                <p class="text-stone-300 text-base sm:text-lg font-light leading-relaxed mb-8">
                    Nikmati ketenangan di lereng pinus berkabut dengan suhu sejuk 18°C – 22°C dan pelayanan keramahan Pasundan autentik.
                </p>

                <div class="flex flex-wrap items-center gap-4">
                    <a href="#kamar" class="px-6 py-3.5 rounded-xl bg-gold-500 hover:bg-gold-600 text-pine-950 font-bold text-sm tracking-wide shadow-lg transition-all">
                        Pilih Kamar & Suite
                    </a>
                    <a href="#tentang" class="px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white font-semibold text-sm transition-all">
                        Pelajari Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms / Posts Showcase Section -->
    <section id="kamar" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-gold-600 font-bold text-xs uppercase tracking-widest block mb-2">AKOMODASI & SUITE</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">Koleksi Kamar Pilihan</h2>
            <p class="text-stone-600 text-sm sm:text-base leading-relaxed">
                Setiap unit dirancang dengan sentuhan kayu jati alami, balkon berpemandangan hutan pinus, dan fasilitas premium.
            </p>
        </div>

        <!-- Category Filter Tabs -->
        @if($categories->isNotEmpty())
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-12">
                <a href="{{ route('home') }}#kamar"
                   class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ !request('category') ? 'bg-pine-900 text-gold-400 shadow-md' : 'bg-white border border-stone-300 text-stone-600 hover:border-pine-900' }}">
                    Semua Kategori ({{ $categories->count() }})
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('home', ['category' => $category->id]) }}#kamar"
                       class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ request('category') == $category->id ? 'bg-pine-900 text-gold-400 shadow-md' : 'bg-white border border-stone-300 text-stone-600 hover:border-pine-900' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        <!-- Posts Grid -->
        @if($posts->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-stone-200 flex flex-col group">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden bg-stone-100">
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=800&q=80' }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                            @if($post->category)
                                <span class="absolute top-4 left-4 bg-pine-900/90 backdrop-blur-md text-gold-400 font-bold text-[11px] uppercase tracking-wider px-3 py-1 rounded-full shadow-md">
                                    {{ $post->category->name }}
                                </span>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-serif font-bold text-xl text-stone-900 mb-2 group-hover:text-pine-900 transition-colors">
                                    {{ $post->title }}
                                </h3>

                                <div class="text-stone-600 text-sm line-clamp-3 mb-6 prose prose-stone text-xs">
                                    {!! strip_tags($post->content) !!}
                                </div>
                            </div>

                            <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                                <span class="text-xs text-stone-400 font-medium">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                                <a href="{{ route('post.show', $post) }}"
                                   class="inline-flex items-center gap-1.5 text-xs font-bold text-pine-900 hover:text-gold-600 transition-colors">
                                    <span>Lihat Detail</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="max-w-md mx-auto text-center py-16 px-6 bg-white rounded-2xl border border-dashed border-stone-300">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="font-serif font-bold text-lg text-stone-900 mb-2">Belum Ada Kamar Terdaftar</h3>
                <p class="text-stone-500 text-xs leading-relaxed mb-6">
                    Kamar yang Anda tambahkan melalui Filament Admin akan otomatis ditampilkan di sini.
                </p>
                <a href="#kontak" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-pine-900 text-gold-400 font-bold text-xs shadow-md hover:bg-pine-800 transition-all">
                    <span>Hubungi Concierge Kami</span>
                </a>
            </div>
        @endif
    </section>

    @if(isset($services) && $services->isNotEmpty())
    <!-- Services Section -->
    <section id="layanan" class="py-20 bg-white border-t border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-gold-600 font-bold text-xs uppercase tracking-widest block mb-2">FASILITAS & LAYANAN</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-4">Pengalaman Resor Eksklusif</h2>
                <p class="text-stone-600 text-sm sm:text-base leading-relaxed">
                    Nikmati ragam fasilitas istimewa yang kami sediakan untuk kenyamanan menginap Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-md transition-all">
                        @if($service->image)
                            <div class="h-48 overflow-hidden bg-stone-100">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-serif font-bold text-lg text-pine-900 mb-2">{{ $service->name }}</h3>
                            <p class="text-stone-600 text-xs leading-relaxed">{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Highlights / About Section -->
    <section id="tentang" class="py-20 bg-stone-100 border-t border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-gold-600 font-bold text-xs uppercase tracking-widest block mb-2">TENTANG KAMI</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-6 leading-tight">
                        Suaka Keasrian Parahyangan Berpadu Kemewahan Modern
                    </h2>
                    <p class="text-stone-600 text-sm sm:text-base leading-relaxed mb-6 font-light">
                        Terletak di lereng Gunung Salak dengan ketinggian 1.150 mdpl, Grand Bogor Resort menghadirkan suaka botanikal seluas 12 hektar dengan pelestarian flora langka dan keramahan filosofi Pasundan <em>"Soméah Hade ka Sémah"</em>.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-white rounded-xl shadow-xs border border-stone-200">
                            <span class="block font-serif font-bold text-2xl text-pine-900 mb-1">1.150 m</span>
                            <span class="text-xs text-stone-500">Ketinggian Dataran Tinggi</span>
                        </div>
                        <div class="p-4 bg-white rounded-xl shadow-xs border border-stone-200">
                            <span class="block font-serif font-bold text-2xl text-pine-900 mb-1">18°C – 22°C</span>
                            <span class="text-xs text-stone-500">Suhu Sejuk Alami</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-xl border border-stone-200">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1000&q=80"
                         alt="Resort Pool"
                         class="w-full h-80 lg:h-96 object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer / Contact -->
    <footer id="kontak" class="bg-pine-950 text-white pt-16 pb-12 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-12 border-b border-white/10">
                <div>
                    <h4 class="font-serif font-bold text-lg text-gold-400 mb-4">GRAND BOGOR RESORT</h4>
                    <p class="text-stone-300 text-xs leading-relaxed font-light mb-4">
                        Sanctuary peristirahatan eksklusif di lereng Cisarua Puncak. Harmoni alam hutan pinus dengan kemewahan modern.
                    </p>
                </div>
                <div>
                    <h5 class="font-bold text-xs uppercase tracking-wider text-stone-300 mb-4">Kontak & Reservasi</h5>
                    <ul class="text-xs text-stone-300 space-y-2.5 font-light">
                        <li>📍 Bogor, Jawa Barat, Indonesia</li>
                        <li>💬 WhatsApp: +62 851 2104 1702</li>
                        <li>✉️ Email: darell.nugraha30@gmail.com</li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-xs uppercase tracking-wider text-stone-300 mb-4">Akses Cepat</h5>
                    <div class="flex flex-col gap-2 text-xs text-stone-300">
                        <a href="#kamar" class="hover:text-gold-400 transition-colors">→ Katalog Kamar & Suite</a>
                        <a href="#tentang" class="hover:text-gold-400 transition-colors">→ Profil Resor & Keasrian</a>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] text-stone-400 gap-4">
                <span>© {{ date('Y') }} Bogor Grand Hotel & Resort. All rights reserved.</span>
                <span>Dibangun dengan Laravel 12 & Filament 5</span>
            </div>
        </div>
    </footer>

</body>
</html>

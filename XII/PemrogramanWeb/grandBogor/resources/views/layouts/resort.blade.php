<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Grand Bogor Resort & Botanical Sanctuary | Suaka Kemewahan di Lereng Puncak')</title>
    <meta name="description" content="@yield('meta_description', 'Sanctuary peristirahatan eksklusif di lereng Gunung Salak dengan panorama lembah pinus berkabut, kebun botani 12 hektar, dan keramahan Pasundan autentik.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="{{ asset('images/resort/p1_11_87.jpg') }}" fetchpriority="high">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pine: {
                            850: '#0b332e',
                            900: '#082622',
                            950: '#041715',
                        },
                        gold: {
                            300: '#F0D68A',
                            400: '#E4BF58',
                            500: '#C89D46',
                            600: '#A67D28',
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
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FAFAF8;
            color: #1F2937;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
        .gold-gradient-text {
            background: linear-gradient(135deg, #F0D68A 0%, #C89D46 50%, #A67D28 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gold-border-gradient {
            border-image: linear-gradient(to right, #F0D68A, #C89D46) 1;
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased selection:bg-gold-500 selection:text-white">

    @if(!request()->is('/') && !request()->is('home'))
    <!-- Top Announcement Bar (From PDF Header) -->
    <div class="bg-pine-950 text-emerald-100/90 text-xs py-2 px-4 border-b border-emerald-900/40">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-900/80 text-amber-300 font-medium text-[11px] border border-amber-400/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                    Elevasi 1.150 mdpl
                </span>
                <span class="hidden md:inline text-emerald-200/80">Suhu Sejuk Alami: 18°C – 22°C • Cisarua, Puncak, Jawa Barat</span>
            </div>
            <div class="flex items-center gap-4 text-[11px]">
                <a href="https://wa.me/628118900777" target="_blank" class="hover:text-amber-300 flex items-center gap-1 transition">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.299.144.35.49 1.199.533 1.286.044.087.073.188.014.304-.058.115-.087.188-.173.289l-.26.303c-.087.088-.178.183-.076.358.101.174.451.744.968 1.205.666.594 1.228.778 1.402.865.173.086.275.072.376-.044.101-.116.433-.506.549-.679.116-.174.232-.145.39-.087s1.011.477 1.184.564.289.13.332.203c.044.072.044.419-.1.824z"/></svg>
                    <span>VIP Concierge: <strong>+62 811 8900 777</strong></span>
                </a>
                <span class="text-emerald-700">|</span>
                <a href="{{ url('/admin') }}" class="text-amber-300 hover:text-amber-200 font-semibold flex items-center gap-1 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    <span>Portal Admin</span>
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Main Navigation Header (Matching PDF Layout) -->
    <header class="bg-white sticky top-0 z-40 border-b border-stone-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Logo & Typography -->
                <a href="{{ url('/') }}" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 rounded-xl bg-pine-900 border border-gold-500/40 flex items-center justify-center text-gold-400 font-serif font-bold text-xl shadow-xs group-hover:scale-105 transition-transform duration-300">
                        GB
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold tracking-tight text-pine-900 leading-none group-hover:text-gold-600 transition-colors">
                            Grand Bogor
                        </span>
                        <span class="text-[9px] tracking-[0.25em] uppercase font-bold text-stone-600 mt-1">
                            Resort & Botanical Sanctuary
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-[13px] font-semibold text-stone-700">
                    <a href="{{ url('/') }}" class="px-3 py-1.5 transition {{ request()->is('/') ? 'text-pine-900 font-bold border-b-2 border-[#745711]' : 'hover:text-pine-900 hover:bg-stone-50 rounded-lg' }}">
                        Beranda
                    </a>
                    <a href="{{ url('/tentang-kami') }}" class="px-3 py-1.5 transition {{ request()->is('tentang-kami') ? 'text-pine-900 font-bold border-b-2 border-[#745711]' : 'hover:text-pine-900 hover:bg-stone-50 rounded-lg' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ url('/#fasilitas') }}" class="px-3 py-1.5 transition hover:text-pine-900 hover:bg-stone-50 rounded-lg">
                        Layanan & Fasilitas
                    </a>
                    <a href="{{ url('/galeri') }}" class="px-3 py-1.5 transition {{ request()->is('galeri') ? 'text-pine-900 font-bold border-b-2 border-[#745711]' : 'hover:text-pine-900 hover:bg-stone-50 rounded-lg' }}">
                        Galeri Resor
                    </a>
                    <a href="{{ url('/tim-manajemen') }}" class="px-3 py-1.5 transition {{ request()->is('tim-manajemen') ? 'text-pine-900 font-bold border-b-2 border-[#745711]' : 'hover:text-pine-900 hover:bg-stone-50 rounded-lg' }}">
                        Tim Manajemen
                    </a>
                    <a href="{{ url('/kontak') }}" class="px-3 py-1.5 transition {{ request()->is('kontak') ? 'text-pine-900 font-bold border-b-2 border-[#745711]' : 'hover:text-pine-900 hover:bg-stone-50 rounded-lg' }}">
                        Kontak & Lokasi
                    </a>
                    <a href="{{ url('/admin') }}" class="px-3 py-1.5 transition hover:text-pine-900 hover:bg-stone-50 rounded-lg text-stone-600">
                        Portal Admin
                    </a>
                    <a href="{{ url('/posts') }}" class="px-3 py-1.5 transition {{ request()->is('posts*') ? 'text-pine-900 font-bold border-b-2 border-[#745711]' : 'hover:text-pine-900 hover:bg-stone-50 rounded-lg' }}">
                        Jurnal
                    </a>
                </nav>

                <!-- Header Actions: Reservasi CTA -->
                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ url('/kontak#reservasi') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-[#745711] hover:bg-[#5f470f] text-white font-bold text-xs tracking-wider uppercase shadow-xs transition-all hover:shadow-md hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Reservasi Kamar</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" type="button" class="p-2 rounded-lg text-stone-600 hover:text-pine-900 hover:bg-stone-100 focus:outline-hidden" aria-label="Toggle menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-stone-200 bg-white px-4 pt-3 pb-6 space-y-2 shadow-lg">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->is('/') ? 'bg-pine-900 text-gold-300' : 'text-stone-700 hover:bg-stone-100' }}">Beranda</a>
            <a href="{{ url('/tentang-kami') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->is('tentang-kami') ? 'bg-pine-900 text-gold-300' : 'text-stone-700 hover:bg-stone-100' }}">Tentang Kami</a>
            <a href="{{ url('/#fasilitas') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-stone-700 hover:bg-stone-100">Layanan & Fasilitas</a>
            <a href="{{ url('/galeri') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->is('galeri') ? 'bg-pine-900 text-gold-300' : 'text-stone-700 hover:bg-stone-100' }}">Galeri Resor</a>
            <a href="{{ url('/tim-manajemen') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->is('tim-manajemen') ? 'bg-pine-900 text-gold-300' : 'text-stone-700 hover:bg-stone-100' }}">Tim Manajemen</a>
            <a href="{{ url('/kontak') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->is('kontak') ? 'bg-pine-900 text-gold-300' : 'text-stone-700 hover:bg-stone-100' }}">Kontak & Lokasi</a>
            <a href="{{ url('/posts') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->is('posts*') ? 'bg-pine-900 text-gold-300' : 'text-stone-700 hover:bg-stone-100' }}">Jurnal & Berita</a>
            <div class="pt-4 border-t border-stone-100 flex flex-col gap-2">
                <a href="{{ url('/admin') }}" class="text-center py-2.5 rounded-lg border border-stone-300 text-xs font-bold text-pine-900">Portal Admin</a>
                <a href="{{ url('/kontak#reservasi') }}" class="text-center py-2.5 rounded-lg bg-pine-900 text-gold-300 text-xs font-bold uppercase tracking-wider">Reservasi Kamar</a>
            </div>
        </div>
    </header>

    <!-- Page Content Slot -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Master Footer (Exact Content from PDF Pages 1-5) -->
    <footer class="bg-pine-950 text-stone-300 border-t border-pine-900 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-emerald-900/40">
                
                <!-- Column 1: Brand & Philosophy (4 cols) -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-pine-900 border border-gold-500/50 flex items-center justify-center text-gold-400 font-serif font-bold text-xl">
                            GB
                        </div>
                        <div>
                            <span class="font-serif text-xl font-bold tracking-tight text-white block">
                                Grand Bogor Resort
                            </span>
                            <span class="text-[9px] tracking-[0.2em] uppercase font-semibold text-gold-400 block">
                                & Botanical Sanctuary
                            </span>
                        </div>
                    </div>
                    <p class="text-stone-400 text-xs leading-relaxed max-w-sm">
                        Suaka peristirahatan mewah di ketinggian Puncak Bogor. Menyajikan keanggunan botanikal, privasi murni, dan pengalaman relaksasi berkelas dunia dengan atmosfer dataran tinggi nan asri.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-emerald-950/90 text-emerald-300 text-[10px] font-bold border border-emerald-800/80">
                            <svg class="w-3 h-3 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            CHSE CERTIFIED
                        </span>
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-pine-900 text-gold-400 text-[10px] font-bold border border-gold-500/30">
                            ★ 5-STAR LUXURY
                        </span>
                    </div>
                </div>

                <!-- Column 2: Tautan Cepat (2 cols) -->
                <div class="lg:col-span-2 space-y-3">
                    <h4 class="text-white font-serif font-bold text-sm tracking-wide">Tautan Cepat</h4>
                    <ul class="space-y-2 text-xs text-stone-400">
                        <li><a href="{{ url('/') }}" class="hover:text-gold-300 transition">Beranda</a></li>
                        <li><a href="{{ url('/tentang-kami') }}" class="hover:text-gold-300 transition">Tentang Kami</a></li>
                        <li><a href="{{ url('/#fasilitas') }}" class="hover:text-gold-300 transition">Layanan & Fasilitas</a></li>
                        <li><a href="{{ url('/galeri') }}" class="hover:text-gold-300 transition">Galeri Resor</a></li>
                        <li><a href="{{ url('/tim-manajemen') }}" class="hover:text-gold-300 transition">Tim Manajemen</a></li>
                        <li><a href="{{ url('/kontak') }}" class="hover:text-gold-300 transition">Kontak & Lokasi</a></li>
                        <li><a href="{{ url('/posts') }}" class="hover:text-gold-300 transition">Jurnal & Berita</a></li>
                    </ul>
                </div>

                <!-- Column 3: Direct Concierge (3 cols) -->
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="text-white font-serif font-bold text-sm tracking-wide">Direct Concierge</h4>
                    <div class="space-y-2 text-xs text-stone-400">
                        <p class="text-white font-medium">+62 251 8259 888</p>
                        <p class="text-emerald-400 font-medium">+62 811 8900 777 <span class="text-[10px] text-stone-400">(VIP WhatsApp)</span></p>
                        <p>concierge@grandbogorresort.com</p>
                        <p>reservasi@grandbogorresort.com</p>
                        <p class="pt-1 text-[11px] leading-snug">
                            Jl. Raya Puncak Km 84, Cisarua, Bogor, Jawa Barat 16750, Indonesia
                        </p>
                    </div>
                </div>

                <!-- Column 4: Konektivitas & Keamanan (3 cols) -->
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="text-white font-serif font-bold text-sm tracking-wide">Konektivitas & Keamanan</h4>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        Layanan reservasi botanikal aman dengan dukungan transaksi terenkripsi perbankan 24 jam nonstop.
                    </p>
                    <div class="p-3.5 rounded-lg bg-pine-900/80 border border-emerald-800/40 text-xs">
                        <div class="flex items-center gap-2 text-amber-400 font-semibold mb-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            SISTEM RESERVASI TERENKRIPSI
                        </div>
                        <p class="text-[11px] text-stone-300">SSL 256-Bit Secure Payment Gateway</p>
                    </div>
                </div>

            </div>

            <!-- Bottom Legal Bar -->
            <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-stone-400 gap-4">
                <p>© 2025 PT Grand Bogor Hospitality Sanctuary. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center space-x-6">
                    <a href="#" class="hover:text-gold-300 transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-gold-300 transition">Syarat & Ketentuan</a>
                    <a href="{{ url('/admin') }}" class="text-gold-400 hover:underline font-semibold">Portal Staf & Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Simple Mobile Menu Toggle Script -->
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>

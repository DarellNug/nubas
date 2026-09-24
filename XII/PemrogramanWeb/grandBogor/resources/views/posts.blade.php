<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal & Berita | Grand Bogor Resort & Botanical Sanctuary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FBFBFA] text-gray-800 antialiased min-h-screen flex flex-col">

    <!-- Top Announcement Bar -->
    <div class="bg-[#082622] text-emerald-100 text-xs py-2 px-4 border-b border-emerald-900/50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-amber-400"></span>
                <span>Grand Bogor Resort & Botanical Sanctuary • Puncak, Jawa Barat (1.150 mdpl)</span>
            </div>
            <div class="flex items-center gap-4">
                <span>VIP WhatsApp: +62 811 8900 777</span>
                <a href="{{ url('/admin') }}" class="text-amber-300 hover:text-amber-200 font-semibold underline">Portal Admin</a>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="bg-white/90 backdrop-blur-md sticky top-0 z-40 border-b border-gray-100 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-[#082622] flex items-center justify-center text-amber-400 font-serif font-bold text-xl shadow-xs">
                    GB
                </div>
                <div>
                    <a href="{{ url('/') }}" class="font-serif text-xl font-bold text-[#082622] tracking-tight block">
                        Grand Bogor
                    </a>
                    <span class="text-[10px] uppercase tracking-widest text-amber-700 font-semibold block -mt-1">
                        Resort & Botanical Sanctuary
                    </span>
                </div>
            </div>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-700">
                <a href="{{ url('/') }}" class="hover:text-emerald-800 transition-colors">Beranda</a>
                <a href="{{ url('/posts') }}" class="text-emerald-900 font-bold border-b-2 border-amber-600 pb-1">Jurnal & Berita</a>
                <a href="{{ url('/admin/rooms') }}" class="hover:text-emerald-800 transition-colors">Inventaris Kamar</a>
                <a href="{{ url('/admin/reservations') }}" class="hover:text-emerald-800 transition-colors">Reservasi</a>
                <a href="{{ url('/admin') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-lg text-xs font-bold text-white bg-[#082622] hover:bg-[#0b352f] transition-all shadow-sm">
                    Admin Portal
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-[#082622] text-white py-16 sm:py-20 px-4 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#fbbf24_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <span class="inline-block py-1 px-3.5 rounded-full bg-emerald-900/60 border border-emerald-700/50 text-amber-300 text-xs font-semibold tracking-wider uppercase mb-4">
                Warta & Cerita Santuari
            </span>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold tracking-tight mb-4 text-emerald-50">
                Jurnal & Kabar Terkini Resor
            </h1>
            <p class="text-emerald-200/80 text-sm sm:text-base max-w-2xl mx-auto font-light leading-relaxed">
                Jelajahi kisah pelestarian botani, kuliner autentik Pasundan, pembaruan fasilitas, serta inspirasi peristirahatan mewah di ketinggian Puncak Bogor.
            </p>

            <!-- Search & Filter Bar -->
            <div class="mt-8 max-w-2xl mx-auto">
                <form action="{{ url('/posts') }}" method="GET" class="flex flex-col sm:flex-row gap-2 bg-white/10 p-2 rounded-xl backdrop-blur-sm border border-white/20">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari artikel, topik, atau kata kunci..."
                           class="flex-1 px-4 py-2.5 rounded-lg bg-white text-gray-900 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <button type="submit" class="px-6 py-2.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold transition-colors shadow-sm">
                        Cari Artikel
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Category Filter Pills -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 overflow-x-auto flex items-center gap-2">
            <a href="{{ url('/posts') }}"
               class="px-4 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-colors {{ !request('category') ? 'bg-[#082622] text-white shadow-xs' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Semua Kategori ({{ $posts->total() }})
            </a>
            @foreach($categories as $category)
                <a href="{{ url('/posts?category=' . $category->id) }}"
                   class="px-4 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-colors {{ request('category') == $category->id ? 'bg-[#082622] text-white shadow-xs' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ $category->name }} ({{ $category->posts_count }})
                </a>
            @endforeach
        </div>
    </div>

    <!-- Main Posts Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-1">
        @if($posts->isEmpty())
            <div class="bg-white border border-gray-200 rounded-2xl p-12 text-center max-w-md mx-auto shadow-xs">
                <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4 text-emerald-800">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="font-serif text-lg font-bold text-gray-900 mb-2">Belum Ada Artikel</h3>
                <p class="text-sm text-gray-500 mb-6">Artikel yang dicari tidak ditemukan atau belum dipublikasikan oleh kurator resor.</p>
                <a href="{{ url('/posts') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800">
                    Reset Filter Pencarian
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="bg-white border border-gray-200/80 rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition-all duration-300 flex flex-col group">
                        <!-- Image Container -->
                        <div class="relative h-52 overflow-hidden bg-gray-100">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-[#082622]/10 flex items-center justify-center text-emerald-900 font-serif font-bold text-2xl">
                                    Grand Bogor
                                </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-[#082622]/90 text-amber-300 backdrop-blur-xs">
                                    {{ $post->category->name ?? 'Resort' }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Area -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="text-xs text-gray-400 mb-2 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
                                </div>

                                <h2 class="font-serif text-xl font-bold text-gray-900 group-hover:text-emerald-800 transition-colors leading-snug mb-3">
                                    <a href="{{ url('/posts/' . $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <div class="text-sm text-gray-600 line-clamp-3 leading-relaxed mb-6">
                                    {!! strip_tags($post->content) !!}
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                <a href="{{ url('/posts/' . $post->id) }}"
                                   class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 hover:text-amber-700 transition-colors">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <span class="text-[11px] text-gray-400">Tim Kurator Resor</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-[#082622] text-white border-t border-emerald-950 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <h3 class="font-serif text-2xl font-bold text-amber-300 mb-2">Grand Bogor Resort</h3>
                    <p class="text-sm text-emerald-200/80 max-w-md font-light leading-relaxed mb-4">
                        Suaka peristirahatan mewah di ketinggian Puncak Bogor (1.150 mdpl). Menghadirkan keanggunan botanikal, privasi murni, dan pengalaman relaksasi berkelas dunia.
                    </p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-900 border border-emerald-700 text-emerald-200">
                        CHSE Certified • 5-Star Luxury Eco-Resort
                    </span>
                </div>
                <div>
                    <h4 class="text-xs font-bold tracking-wider text-amber-400 uppercase mb-3">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm text-emerald-200/80">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ url('/posts') }}" class="hover:text-white transition-colors">Jurnal & Berita</a></li>
                        <li><a href="{{ url('/admin/rooms') }}" class="hover:text-white transition-colors">Koleksi Kamar & Vila</a></li>
                        <li><a href="{{ url('/admin') }}" class="hover:text-white transition-colors">Portal Staf & Admin</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold tracking-wider text-amber-400 uppercase mb-3">Direct Concierge</h4>
                    <p class="text-xs text-emerald-200/80 leading-relaxed">
                        Jl. Raya Puncak Km 84, Cisarua, Bogor, Jawa Barat 16750<br>
                        Tel: +62 251 8259 888<br>
                        VIP WhatsApp: +62 811 8900 777<br>
                        concierge@grandbogorresort.com
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-emerald-900/60 text-center text-xs text-emerald-400/60">
                © {{ date('Y') }} PT Grand Bogor Hospitality Sanctuary. Seluruh Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

</body>
</html>

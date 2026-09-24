<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Grand Bogor Resort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .prose p { margin-bottom: 1.25rem; line-height: 1.8; }
        .prose h2, .prose h3 { font-family: 'Playfair Display', serif; font-weight: bold; margin-top: 2rem; margin-bottom: 1rem; color: #082622; }
    </style>
</head>
<body class="bg-[#FBFBFA] text-gray-800 antialiased min-h-screen flex flex-col">

    <!-- Top Announcement Bar -->
    <div class="bg-[#082622] text-emerald-100 text-xs py-2 px-4 border-b border-emerald-900/50">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ url('/posts') }}" class="inline-flex items-center gap-1.5 text-amber-300 hover:text-amber-200">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Semua Artikel</span>
            </a>
            <div class="flex items-center gap-4">
                <span>VIP WhatsApp: +62 811 8900 777</span>
                <a href="{{ url('/admin') }}" class="text-amber-300 hover:text-amber-200 font-semibold underline">Portal Admin</a>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="bg-white sticky top-0 z-40 border-b border-gray-100 shadow-xs">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-[#082622] flex items-center justify-center text-amber-400 font-serif font-bold text-xl">
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

            <nav class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ url('/posts') }}" class="text-emerald-900 font-bold hover:text-emerald-700">Semua Warta</a>
                <a href="{{ url('/admin/rooms') }}" class="hidden sm:inline text-gray-600 hover:text-emerald-800">Kamar & Vila</a>
                <a href="{{ url('/admin') }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-white bg-[#082622] hover:bg-[#0b352f]">
                    Admin
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1">
        <!-- Breadcrumbs -->
        <nav class="text-xs text-gray-500 mb-6 flex items-center gap-2">
            <a href="{{ url('/') }}" class="hover:text-emerald-800">Beranda</a>
            <span>/</span>
            <a href="{{ url('/posts') }}" class="hover:text-emerald-800">Jurnal & Berita</a>
            <span>/</span>
            <span class="text-gray-900 font-medium truncate max-w-xs">{{ $post->title }}</span>
        </nav>

        <!-- Article Header -->
        <header class="mb-8">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="px-3 py-1 rounded-md text-xs font-bold bg-[#082622] text-amber-300">
                    {{ $post->category->name ?? 'Resort News' }}
                </span>
                <span class="text-xs text-gray-400">
                    {{ $post->created_at->translatedFormat('d F Y, H:i') }} WIB
                </span>
            </div>

            <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-100 text-xs text-gray-500">
                <div class="w-8 h-8 rounded-full bg-emerald-900 text-amber-300 font-bold flex items-center justify-center font-serif">
                    GB
                </div>
                <div>
                    <p class="font-bold text-gray-900">Kurator & Tim Komunikasi Grand Bogor</p>
                    <p class="text-gray-400">Grand Bogor Resort & Botanical Sanctuary • Cisarua, Puncak</p>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($post->image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-sm bg-gray-100 max-h-[480px]">
                <img src="{{ asset('storage/' . $post->image) }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Article Body -->
        <div class="prose max-w-none text-gray-700 text-base sm:text-lg leading-relaxed bg-white p-6 sm:p-10 rounded-2xl border border-gray-200/80 shadow-xs mb-10">
            {!! $post->content !!}
        </div>

        <!-- Back to Posts Button -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-6 bg-emerald-900 text-white rounded-2xl mb-12 shadow-xs">
            <div>
                <h3 class="font-serif text-lg font-bold text-amber-300 mb-1">Tertarik Menikmati Suasana Santuari Ini?</h3>
                <p class="text-xs sm:text-sm text-emerald-200 font-light">Reservasi kamar atau konsultasikan kebutuhan perjalanan Anda dengan concierge kami.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ url('/posts') }}"
                   class="px-4 py-2 rounded-lg text-xs font-bold text-white bg-white/10 hover:bg-white/20 transition-colors">
                    Daftar Artikel
                </a>
                <a href="{{ url('/admin/reservations/create') }}"
                   class="px-4 py-2 rounded-lg text-xs font-bold text-gray-900 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
                    Reservasi Sekarang
                </a>
            </div>
        </div>

        <!-- Related Posts Section -->
        @if(isset($relatedPosts) && $relatedPosts->isNotEmpty())
            <div class="border-t border-gray-200 pt-10">
                <h3 class="font-serif text-2xl font-bold text-gray-900 mb-6">Artikel Terkait</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $related)
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-xs hover:shadow-md transition-shadow flex flex-col">
                            @if($related->image)
                                <img src="{{ asset('storage/' . $related->image) }}" class="h-32 w-full object-cover">
                            @endif
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <h4 class="font-serif font-bold text-sm text-gray-900 line-clamp-2 hover:text-emerald-800 mb-3">
                                    <a href="{{ url('/posts/' . $related->id) }}">{{ $related->title }}</a>
                                </h4>
                                <a href="{{ url('/posts/' . $related->id) }}" class="text-xs font-bold text-emerald-800">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-[#082622] text-white border-t border-emerald-950">
        <div class="max-w-5xl mx-auto px-4 py-8 text-center text-xs text-emerald-300/70">
            © {{ date('Y') }} Grand Bogor Resort & Botanical Sanctuary. Seluruh Hak Cipta Dilindungi.
        </div>
    </footer>

</body>
</html>

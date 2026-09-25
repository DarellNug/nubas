<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Bogor Grand Hotel & Resort</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pine: {
                            900: '#072420',
                            950: '#041715',
                        },
                        gold: {
                            300: '#fde68a',
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
<body class="bg-stone-50 text-stone-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Top Header -->
    <header class="bg-white border-b border-stone-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-bold text-pine-900 hover:text-gold-500 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Beranda</span>
            </a>
            <span class="font-serif font-bold text-pine-900 text-sm">Bogor Grand Hotel & Resort</span>
        </div>
    </header>

    <!-- Main Detail Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-10 w-full flex-1">
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-stone-200">
            <!-- Full Image -->
            <div class="w-full h-80 sm:h-96 bg-stone-100 relative">
                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1200&q=80' }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
                @if($post->category)
                    <span class="absolute top-6 left-6 bg-pine-950/90 backdrop-blur-md text-amber-300 border border-amber-400/40 font-bold text-xs uppercase tracking-wider px-3.5 py-1.5 rounded-full shadow-lg">
                        {{ $post->category->name }}
                    </span>
                @endif
            </div>

            <!-- Content Area -->
            <div class="p-8 sm:p-12">
                <div class="flex items-center justify-between text-xs text-stone-400 mb-4 pb-4 border-b border-stone-100">
                    <span>Diperbarui: {{ $post->updated_at->format('d F Y') }}</span>
                    <span>Koleksi Kamar Resmi</span>
                </div>

                <h1 class="font-serif text-3xl sm:text-4xl font-bold text-pine-900 mb-6">
                    {{ $post->title }}
                </h1>

                <!-- Rich Text Description / Amenities -->
                <div class="prose prose-stone max-w-none text-stone-700 leading-relaxed mb-10">
                    {!! $post->content !!}
                </div>


            </div>
        </div>
    </main>

    <!-- Simple Footer -->
    <footer class="py-6 text-center text-xs text-stone-400 border-t border-stone-200">
        © {{ date('Y') }} Bogor Grand Hotel & Resort
    </footer>

</body>
</html>

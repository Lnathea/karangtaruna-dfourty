<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin') — D'Fourty</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        paper: '#FFFFFF',
                        'paper-dim': '#F2F7F2',
                        ink: '#1E1E1E',
                        'ink-soft': '#5A5A5A',
                        brick: '#6BBF3D',
                        'brick-dark': '#55A02E',
                        leaf: '#5CB348',
                        'leaf-dark': '#3D8C2F',
                        bamboo: '#6B7280',
                    },
                    fontFamily: {
                        display: ['Fraunces', 'serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body { background-color: #FFFFFF; overflow-x: hidden; }
        a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible {
            outline: 2px solid #6BBF3D;
            outline-offset: 2px;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: #FFFFFF; }
        ::-webkit-scrollbar-thumb { background: #2F7D48; border-radius: 8px; }
        ::-webkit-scrollbar-thumb:hover { background: #1F6B3B; }
        ::-webkit-scrollbar-button { display: none; width: 0; height: 0; }
        html { scrollbar-width: thin; scrollbar-color: #2F7D48 #FFFFFF; }
    </style>
</head>
<body class="font-body text-ink antialiased">
<div class="min-h-screen flex flex-col md:flex-row">

    <aside class="md:w-64 shrink-0 bg-ink text-paper flex flex-col">
        <div class="px-6 py-5 border-b border-paper/10">
            <div class="flex items-center gap-3">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Karang Taruna D'Fourty" class="h-8 w-auto">
                <div>
                    <p class="font-display text-xl text-bamboo">D'Fourty</p>
                    <p class="text-xs uppercase tracking-widest text-paper/60">Panel Admin</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 px-3 py-4 space-y-1 text-sm font-medium">
            <a href="{{ route('admin.dashboard') }}" class="block rounded-md px-3 py-2 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-brick text-white' : 'text-paper/80 hover:bg-white/10' }}">Dashboard</a>
            <a href="{{ route('admin.proker.index') }}" class="block rounded-md px-3 py-2 transition-colors {{ request()->routeIs('admin.proker.*') ? 'bg-brick text-white' : 'text-paper/80 hover:bg-white/10' }}">Program Kerja</a>
            <a href="{{ route('admin.galeri.index') }}" class="block rounded-md px-3 py-2 transition-colors {{ request()->routeIs('admin.galeri.*') ? 'bg-brick text-white' : 'text-paper/80 hover:bg-white/10' }}">Galeri</a>
            <a href="{{ route('admin.anggota.index') }}" class="block rounded-md px-3 py-2 transition-colors {{ request()->routeIs('admin.anggota.*') ? 'bg-brick text-white' : 'text-paper/80 hover:bg-white/10' }}">Data Anggota</a>
        </nav>
        <div class="px-3 py-4 border-t border-paper/10 space-y-2">
            <a href="{{ route('home') }}" class="block rounded-md px-3 py-2 text-sm text-paper/70 hover:bg-white/10 transition-colors">&larr; Lihat situs publik</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left rounded-md px-3 py-2 text-sm text-paper/70 hover:bg-white/10 transition-colors">Keluar</button>
            </form>
        </div>
    </aside>

    <div class="flex-1 min-w-0">
        <header class="border-b border-ink/10 bg-paper/95 backdrop-blur px-6 py-4 flex items-center justify-between">
            <h1 class="font-display text-2xl">@yield('title', 'Dashboard')</h1>
            <span class="text-sm text-ink-soft">{{ auth()->user()->name }}</span>
        </header>

        <main class="p-6">
            @if (session('status'))
                <div class="mb-6 bg-leaf/10 border border-leaf/30 text-leaf-dark text-sm rounded-md px-4 py-3">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 bg-brick/10 border border-brick/30 text-brick-dark text-sm rounded-md px-4 py-3">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>

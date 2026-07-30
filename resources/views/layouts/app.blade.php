<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karang Taruna D\'Fourty') — RW 040 Panorama Wanasari</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <meta name="description" content="Website resmi Karang Taruna D'Fourty, RW 040 Perumahan Panorama Wanasari, Cibitung, Bekasi.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Karang Taruna D'Fourty">
    <meta property="og:title" content="@yield('og_title', "Karang Taruna D'Fourty — RW 040 Panorama Wanasari")">
    <meta property="og:description" content="@yield('og_description', 'Wadah pemuda-pemudi RW 040 Panorama Wanasari untuk kegiatan sosial, olahraga, seni, dan gotong royong warga.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', "Karang Taruna D'Fourty — RW 040 Panorama Wanasari")">
    <meta name="twitter:description" content="@yield('og_description', 'Wadah pemuda-pemudi RW 040 Panorama Wanasari untuk kegiatan sosial, olahraga, seni, dan gotong royong warga.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo.png'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
        .font-display { font-optical-sizing: auto; }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: #FFFFFF; }
        ::-webkit-scrollbar-thumb { background: #2F7D48; border-radius: 8px; }
        ::-webkit-scrollbar-thumb:hover { background: #1F6B3B; }
        ::-webkit-scrollbar-button { display: none; width: 0; height: 0; }
        html { scrollbar-width: thin; scrollbar-color: #2F7D48 #FFFFFF; }

        /* Signature: papan mading (community bulletin board) pinned-notice card */
        .mading-card {
            position: relative;
            background: #F8FBF8;
            border: 1px solid rgba(30, 30, 30, 0.10);
            box-shadow: 0 2px 0 rgba(30, 30, 30, 0.04), 0 10px 20px -12px rgba(30, 30, 30, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .mading-card:hover {
            box-shadow: 0 4px 0 rgba(30, 30, 30, 0.06), 0 18px 30px -14px rgba(30, 30, 30, 0.30);
        }
        .mading-card::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%) rotate(-3deg);
            width: 46px;
            height: 20px;
            background: rgba(107, 191, 61, 0.55);
            border: 1px solid rgba(107, 191, 61, 0.65);
        }
        .mading-tilt-1 { transform: rotate(-0.6deg); }
        .mading-tilt-2 { transform: rotate(0.5deg); }
        .mading-tilt-3 { transform: rotate(-0.3deg); }
        .mading-tilt-1:hover, .mading-tilt-2:hover, .mading-tilt-3:hover { transform: rotate(0deg) translateY(-2px); }

        @media (prefers-reduced-motion: reduce) {
            .mading-card, .mading-tilt-1, .mading-tilt-2, .mading-tilt-3 { transition: none !important; transform: none !important; }
        }

        a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible {
            outline: 2px solid #6BBF3D;
            outline-offset: 2px;
        }

        .status-pill { font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: 0.02em; }
    </style>
</head>
<body class="font-body text-ink antialiased">

    <header class="border-b border-ink/10 bg-paper/95 backdrop-blur sticky top-0 z-30">
        <div class="max-w-[1600px] mx-auto px-5 sm:px-8 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Karang Taruna D'Fourty" class="h-9 w-auto">
                <span class="font-display font-semibold text-2xl tracking-tight text-brick">D'Fourty</span>
                <span class="hidden sm:inline text-xs uppercase tracking-widest text-ink-soft">Karang Taruna RW 040</span>
            </a>

            <nav class="hidden md:flex items-center gap-7 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-brick transition-colors {{ request()->routeIs('home') ? 'text-brick' : 'text-ink' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="hover:text-brick transition-colors {{ request()->routeIs('profil') ? 'text-brick' : 'text-ink' }}">Profil</a>
                <a href="{{ route('proker.index') }}" class="hover:text-brick transition-colors {{ request()->routeIs('proker.*') ? 'text-brick' : 'text-ink' }}">Program Kerja</a>
                <a href="{{ route('galeri.index') }}" class="hover:text-brick transition-colors {{ request()->routeIs('galeri.*') ? 'text-brick' : 'text-ink' }}">Galeri</a>
                <a href="{{ route('anggota.index') }}" class="hover:text-brick transition-colors {{ request()->routeIs('anggota.*') ? 'text-brick' : 'text-ink' }}">Anggota</a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-leaf hover:text-leaf-dark transition-colors">Panel Admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs uppercase tracking-widest text-ink-soft hover:text-brick transition-colors">Masuk Admin</a>
                @endauth
            </div>
        </div>
        <nav class="md:hidden flex items-center gap-4 overflow-x-auto px-5 pb-3 text-sm font-medium">
            <a href="{{ route('home') }}" class="whitespace-nowrap {{ request()->routeIs('home') ? 'text-brick' : 'text-ink-soft' }}">Beranda</a>
            <a href="{{ route('profil') }}" class="whitespace-nowrap {{ request()->routeIs('profil') ? 'text-brick' : 'text-ink-soft' }}">Profil</a>
            <a href="{{ route('proker.index') }}" class="whitespace-nowrap {{ request()->routeIs('proker.*') ? 'text-brick' : 'text-ink-soft' }}">Program Kerja</a>
            <a href="{{ route('galeri.index') }}" class="whitespace-nowrap {{ request()->routeIs('galeri.*') ? 'text-brick' : 'text-ink-soft' }}">Galeri</a>
            <a href="{{ route('anggota.index') }}" class="whitespace-nowrap {{ request()->routeIs('anggota.*') ? 'text-brick' : 'text-ink-soft' }}">Anggota</a>
        </nav>
    </header>

    <main>
        @if (session('status'))
            <div class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-6">
                <div class="bg-leaf/10 border border-leaf/30 text-leaf-dark text-sm rounded-md px-4 py-3">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-20 border-t border-ink/10 bg-paper-dim">
        <div class="max-w-[1600px] mx-auto px-5 sm:px-8 py-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-sm">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Karang Taruna D'Fourty" class="h-8 w-auto">
                    <p class="font-display text-xl text-brick">D'Fourty</p>
                </div>
                <p class="text-ink-soft leading-relaxed">{{ $pengaturan->alamat ?: 'Karang Taruna RW 040, Perumahan Panorama Wanasari, Cibitung, Bekasi, Jawa Barat' }}</p>
            </div>
            <div>
                <p class="font-semibold text-ink mb-2 uppercase text-xs tracking-widest">Jelajahi</p>
                <ul class="space-y-1.5 text-ink-soft">
                    <li><a href="{{ route('proker.index') }}" class="hover:text-brick transition-colors">Program Kerja</a></li>
                    <li><a href="{{ route('galeri.index') }}" class="hover:text-brick transition-colors">Galeri Kegiatan</a></li>
                    <li><a href="{{ route('anggota.index') }}" class="hover:text-brick transition-colors">Data Anggota</a></li>
                </ul>
            </div>
            <div>
                <p class="font-semibold text-ink mb-2 uppercase text-xs tracking-widest">Hubungi Kami</p>
                <ul class="space-y-2 text-ink-soft">
                    @if ($pengaturan->instagram_url)
                    <li>
                        <a href="{{ $pengaturan->instagram_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 hover:text-brick transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.036 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                            Instagram
                        </a>
                    </li>
                    @endif
                    @if ($pengaturan->tiktok_url)
                    <li>
                        <a href="{{ $pengaturan->tiktok_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 hover:text-brick transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                            </svg>
                            TikTok
                        </a>
                    </li>
                    @endif
                    @if ($pengaturan->email_kontak)
                    <li>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $pengaturan->email_kontak }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 hover:text-brick transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                            </svg>
                            {{ $pengaturan->email_kontak }}
                        </a>
                    </li>
                    @endif
                    @if ($pengaturan->whatsapp)
                    <li>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->whatsapp) }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 hover:text-brick transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                            </svg>
                            {{ $pengaturan->whatsapp }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <div>
                <p class="font-semibold text-ink mb-2 uppercase text-xs tracking-widest">Tentang</p>
                <p class="text-ink-soft leading-relaxed">Wadah pemuda-pemudi RW 040 untuk kegiatan sosial, olahraga, seni, dan gotong royong lingkungan.</p>
            </div>
        </div>
        <div class="border-t border-ink/10 py-4 text-center text-xs text-ink-soft">
            &copy; {{ date('Y') }} Karang Taruna D'Fourty — RW 040 Panorama Wanasari.
        </div>
    </footer>

</body>
</html>

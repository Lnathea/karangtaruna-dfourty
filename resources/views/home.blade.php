@extends('layouts.app')

@section('title', 'Beranda')

@section('og_image', $galeriTerbaru->isNotEmpty() ? asset('storage/'.$galeriTerbaru->first()->foto) : asset('images/logo.png'))

@section('content')

@if ($prokerPuncak)
    <section class="bg-ink text-white">
        <div class="max-w-[1600px] mx-auto px-5 sm:px-8 py-4 flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-6 text-center">
            <p class="text-sm sm:text-base font-medium">
                &#127881; Menuju <span class="text-leaf font-semibold">{{ $prokerPuncak->nama_kegiatan }}</span>
            </p>
            <div id="countdown" data-target="{{ $prokerPuncak->tanggal_mulai->format('Y-m-d') }}T18:00:00"
                 class="flex items-center gap-3 sm:gap-4 font-display">
                <div class="text-center">
                    <span id="cd-days" class="block text-xl sm:text-2xl font-semibold text-leaf">00</span>
                    <span class="block text-[9px] sm:text-[10px] uppercase tracking-widest text-white/60">Hari</span>
                </div>
                <span class="text-white/30 text-xl">:</span>
                <div class="text-center">
                    <span id="cd-hours" class="block text-xl sm:text-2xl font-semibold text-leaf">00</span>
                    <span class="block text-[9px] sm:text-[10px] uppercase tracking-widest text-white/60">Jam</span>
                </div>
                <span class="text-white/30 text-xl">:</span>
                <div class="text-center">
                    <span id="cd-minutes" class="block text-xl sm:text-2xl font-semibold text-leaf">00</span>
                    <span class="block text-[9px] sm:text-[10px] uppercase tracking-widest text-white/60">Menit</span>
                </div>
                <span class="text-white/30 text-xl">:</span>
                <div class="text-center">
                    <span id="cd-seconds" class="block text-xl sm:text-2xl font-semibold text-leaf">00</span>
                    <span class="block text-[9px] sm:text-[10px] uppercase tracking-widest text-white/60">Detik</span>
                </div>
            </div>
        </div>
    </section>

    <script>
    (function () {
        const el = document.getElementById('countdown');
        const target = new Date(el.dataset.target).getTime();

        function pad(n) { return String(n).padStart(2, '0'); }

        function tick() {
            const now  = new Date().getTime();
            const diff = target - now;

            if (diff <= 0) {
                ['cd-days','cd-hours','cd-minutes','cd-seconds'].forEach(function(id) {
                    document.getElementById(id).textContent = '00';
                });
                clearInterval(timer);
                return;
            }

            const days    = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours   = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('cd-days').textContent    = pad(days);
            document.getElementById('cd-hours').textContent   = pad(hours);
            document.getElementById('cd-minutes').textContent = pad(minutes);
            document.getElementById('cd-seconds').textContent = pad(seconds);
        }

        tick();
        const timer = setInterval(tick, 1000);
    })();
    </script>
@endif

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-16 grid md:grid-cols-5 gap-10 items-center">
        <div class="md:col-span-3">
            <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-4">Karang Taruna RW 040 &middot; Panorama Wanasari</p>
            <h1 class="font-display text-4xl sm:text-5xl leading-[1.1] text-ink">
                Wadah pemuda-pemudi<br> untuk <span class="italic text-brick">bergerak bareng</span> warga.
            </h1>
            <p class="mt-5 text-ink-soft text-lg leading-relaxed max-w-xl">
                D'Fourty menghimpun anak muda RW 040 untuk kegiatan sosial, olahraga, seni, dan gotong royong —
                mulai dari kerja bakti rutin sampai rangkaian HUT RI setiap Agustus.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('proker.index') }}" class="inline-flex items-center rounded-md bg-brick text-white px-5 py-3 text-sm font-semibold hover:bg-brick-dark transition-colors">Lihat Program Kerja</a>
                <a href="{{ route('profil') }}" class="inline-flex items-center rounded-md border border-ink/15 px-5 py-3 text-sm font-semibold hover:border-brick hover:text-brick transition-colors">Kenali Struktur Kami</a>
            </div>
        </div>

        <div class="md:col-span-2 group">
            @if ($galeriTerbaru->isNotEmpty())
                <div class="relative">
                    <div id="hero-viewport" class="overflow-hidden">
                        <div id="hero-track" class="flex items-center" style="transition: transform 0.5s ease;">
                            @foreach ($galeriTerbaru as $i => $foto)
                                <div class="hero-slide shrink-0 px-2 cursor-pointer" style="width: 72%;" data-index="{{ $i }}">
                                    <div class="hero-slide-inner aspect-[4/3] rounded-2xl overflow-hidden border border-ink/10 shadow-lg transition-all duration-500 {{ $i === 0 ? 'opacity-100 scale-100' : 'opacity-40 scale-90' }}">
                                        <img src="{{ asset('storage/'.$foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover pointer-events-none">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if ($galeriTerbaru->count() > 1)
                        <button type="button" id="hero-prev" aria-label="Sebelumnya"
                            class="absolute left-0 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-ink/70 hover:bg-ink flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button type="button" id="hero-next" aria-label="Berikutnya"
                            class="absolute right-0 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-ink/70 hover:bg-ink flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @endif
                </div>

                @if ($galeriTerbaru->count() > 1)
                    <div class="flex items-center justify-center gap-1.5 mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" id="hero-dots">
                        @foreach ($galeriTerbaru as $i => $foto)
                            <button type="button" data-index="{{ $i }}"
                                class="hero-dot w-2 h-2 rounded-full transition-colors {{ $i === 0 ? 'bg-leaf' : 'bg-ink/20' }}"
                                aria-label="Ke foto {{ $i + 1 }}"></button>
                        @endforeach
                    </div>

                    <script>
                    (function () {
                        const viewport = document.getElementById('hero-viewport');
                        const track = document.getElementById('hero-track');
                        const slides = Array.from(track.querySelectorAll('.hero-slide'));
                        const dots = document.querySelectorAll('#hero-dots .hero-dot');
                        let current = 0;

                        function center(index) {
                            const slide = slides[index];
                            const offset = (viewport.clientWidth / 2) - (slide.offsetLeft + slide.offsetWidth / 2);
                            track.style.transform = `translateX(${offset}px)`;

                            slides.forEach((s, i) => {
                                const inner = s.querySelector('.hero-slide-inner');
                                inner.classList.toggle('opacity-100', i === index);
                                inner.classList.toggle('scale-100', i === index);
                                inner.classList.toggle('opacity-40', i !== index);
                                inner.classList.toggle('scale-90', i !== index);
                            });
                            dots.forEach((d, i) => {
                                d.classList.toggle('bg-leaf', i === index);
                                d.classList.toggle('bg-ink/20', i !== index);
                            });
                            current = index;
                        }

                        document.getElementById('hero-next').addEventListener('click', () => center((current + 1) % slides.length));
                        document.getElementById('hero-prev').addEventListener('click', () => center((current - 1 + slides.length) % slides.length));
                        dots.forEach(d => d.addEventListener('click', () => center(parseInt(d.dataset.index))));
                        slides.forEach((s, i) => s.addEventListener('click', () => center(i)));
                        window.addEventListener('resize', () => center(current));

                        center(0);
                    })();
                    </script>
                @endif
            @else
                <div class="rounded-2xl overflow-hidden border border-ink/10 shadow-lg aspect-[4/3] bg-ink flex flex-col items-center justify-center gap-3 text-center px-6">
                    <span class="font-display text-3xl text-leaf">D'Fourty</span>
                    <p class="text-white/70 text-sm">Foto kegiatan akan tampil di sini setelah diunggah lewat panel admin.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Papan Mading: highlight proker --}}
    <section class="bg-paper-dim/60 border-y border-ink/10 py-16">
        <div class="max-w-[1600px] mx-auto px-5 sm:px-8">
            <div class="flex items-end justify-between mb-8">
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] text-leaf font-semibold mb-2">Papan Mading</p>
                    <h2 class="font-display text-3xl">Kegiatan yang sedang disiapkan</h2>
                </div>
                <a href="{{ route('proker.index') }}" class="hidden sm:inline text-sm font-semibold text-brick hover:text-brick-dark">Semua proker &rarr;</a>
            </div>

            @if ($prokerBerjalan->isEmpty())
                <p class="text-ink-soft">Belum ada program kerja yang tercatat. Cek lagi nanti ya.</p>
            @else
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 pt-2">
                    @foreach ($prokerBerjalan as $i => $proker)
                        <a href="{{ route('proker.show', $proker) }}" class="mading-card mading-tilt-{{ ($i % 3) + 1 }} rounded-sm p-6 block">
                            <span class="status-pill inline-block text-[11px] font-bold uppercase px-2 py-1 rounded
                                {{ $proker->status === 'berlangsung' ? 'bg-leaf/15 text-leaf-dark' : 'bg-bamboo/20 text-ink' }}">
                                {{ $proker->status === 'berlangsung' ? 'Berlangsung' : 'Rencana' }}
                            </span>
                            <h3 class="font-display text-xl mt-3 mb-2">{{ $proker->nama_kegiatan }}</h3>
                            <p class="text-sm text-ink-soft mb-3">{{ \Illuminate\Support\Str::limit($proker->deskripsi, 90) }}</p>
                            <p class="text-xs text-ink-soft">{{ $proker->tanggal_mulai->translatedFormat('d F Y') }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Galeri preview --}}
    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 py-16">
        <div class="flex items-end justify-between mb-8">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-2">Dokumentasi</p>
                <h2 class="font-display text-3xl">Galeri kegiatan terbaru</h2>
            </div>
            <a href="{{ route('galeri.index') }}" class="hidden sm:inline text-sm font-semibold text-brick hover:text-brick-dark">Semua foto &rarr;</a>
        </div>

        @if ($galeriTerbaru->isEmpty())
            <p class="text-ink-soft">Belum ada foto kegiatan yang diunggah.</p>
        @else
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4">
                @foreach ($galeriTerbaru as $foto)
                    <div class="aspect-square rounded-sm overflow-hidden border border-ink/10 bg-paper-dim">
                        <img src="{{ asset('storage/'.$foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
        @endif
    </section>

@endsection

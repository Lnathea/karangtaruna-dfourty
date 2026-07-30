@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
        <div class="bg-white border-t-4 border-leaf rounded-sm p-5 shadow-sm">
            <p class="font-display text-3xl text-leaf">{{ $stat['anggota_aktif'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Anggota Aktif</p>
        </div>
        <div class="bg-white border-t-4 border-ink rounded-sm p-5 shadow-sm">
            <p class="font-display text-3xl text-ink">{{ $stat['anggota_total'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Total Anggota</p>
        </div>
        <div class="bg-white border-t-4 border-leaf rounded-sm p-5 shadow-sm">
            <p class="font-display text-3xl text-leaf">{{ $stat['proker_berjalan'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Proker Berjalan</p>
        </div>
        <div class="bg-white border-t-4 border-ink rounded-sm p-5 shadow-sm">
            <p class="font-display text-3xl text-ink">{{ $stat['galeri_total'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Foto di Galeri</p>
        </div>
    </div>

    <div class="bg-white/60 border border-ink/10 rounded-sm">
        <div class="px-5 py-4 border-b border-ink/10 flex items-center justify-between">
            <h2 class="font-display text-xl">Proker terbaru</h2>
            <a href="{{ route('admin.proker.create') }}" class="text-sm font-semibold text-brick hover:text-brick-dark">+ Tambah proker</a>
        </div>
        @if ($prokerTerbaru->isEmpty())
            <p class="px-5 py-6 text-ink-soft text-sm">Belum ada proker. Yuk tambah yang pertama.</p>
        @else
            <div class="divide-y divide-ink/10">
                @foreach ($prokerTerbaru as $proker)
                    <a href="{{ route('admin.proker.edit', $proker) }}" class="flex items-center justify-between px-5 py-3 hover:bg-paper-dim/50 transition-colors">
                        <span class="font-medium">{{ $proker->nama_kegiatan }}</span>
                        <span class="status-pill inline-block text-[11px] font-bold uppercase px-2 py-1 rounded
                            {{ match($proker->status) {
                                'berlangsung' => 'bg-leaf/15 text-leaf-dark',
                                'selesai' => 'bg-ink/10 text-ink-soft',
                                default => 'bg-bamboo/20 text-ink',
                            } }}">
                            {{ $proker->status }}
                        </span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Widget: anggota menunggu verifikasi --}}
    @if ($menungguVerifikasi->isNotEmpty())
    <div class="bg-white border-t-4 border-leaf rounded-sm shadow-sm mt-6">
        <div class="px-5 py-4 border-b border-ink/10 flex items-center justify-between">
            <h2 class="font-display text-xl">Menunggu Verifikasi</h2>
            <span class="text-xs font-bold uppercase tracking-widest bg-leaf/15 text-leaf-dark px-2 py-1 rounded">
                {{ $menungguVerifikasi->count() }} pendaftar
            </span>
        </div>
        <div class="divide-y divide-ink/10">
            @foreach ($menungguVerifikasi as $calon)
                <div class="flex items-center justify-between px-5 py-3">
                    <div>
                        <p class="font-medium">{{ $calon->nama }}</p>
                        <p class="text-xs text-ink-soft">{{ $calon->no_hp }} &middot; {{ $calon->alamat }}</p>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <a href="{{ route('admin.anggota.edit', $calon) }}" class="text-ink-soft hover:text-brick">Lihat</a>
                        <form action="{{ route('admin.anggota.verify', $calon) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-leaf hover:text-leaf-dark font-semibold">Verifikasi</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Widget: foto terbaru --}}
    <div class="bg-white border-t-4 border-ink rounded-sm shadow-sm mt-6">
        <div class="px-5 py-4 border-b border-ink/10 flex items-center justify-between">
            <h2 class="font-display text-xl">Foto Terbaru</h2>
            <a href="{{ route('admin.galeri.create') }}" class="text-sm font-semibold text-brick hover:text-brick-dark">+ Unggah foto</a>
        </div>
        @if ($galeriTerbaru->isEmpty())
            <p class="px-5 py-6 text-ink-soft text-sm">Belum ada foto yang diunggah.</p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 p-5">
                @foreach ($galeriTerbaru as $foto)
                    <a href="{{ route('admin.galeri.edit', $foto) }}" class="aspect-square rounded-sm overflow-hidden border border-ink/10 block">
                        <img src="{{ asset('storage/'.$foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover">
                    </a>
                @endforeach
            </div>
        @endif
    </div>

@endsection

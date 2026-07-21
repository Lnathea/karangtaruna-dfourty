@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
        <div class="bg-white/60 border border-ink/10 rounded-sm p-5">
            <p class="font-display text-3xl text-brick">{{ $stat['anggota_aktif'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Anggota Aktif</p>
        </div>
        <div class="bg-white/60 border border-ink/10 rounded-sm p-5">
            <p class="font-display text-3xl">{{ $stat['anggota_total'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Total Anggota</p>
        </div>
        <div class="bg-white/60 border border-ink/10 rounded-sm p-5">
            <p class="font-display text-3xl text-leaf">{{ $stat['proker_berjalan'] }}</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Proker Berjalan</p>
        </div>
        <div class="bg-white/60 border border-ink/10 rounded-sm p-5">
            <p class="font-display text-3xl text-bamboo">{{ $stat['galeri_total'] }}</p>
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
                        <span class="text-xs uppercase tracking-widest text-ink-soft">{{ $proker->status }}</span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

@endsection

@extends('layouts.app')

@section('title', $proker->nama_kegiatan)

@section('og_title', $proker->nama_kegiatan . " — Karang Taruna D'Fourty")
@section('og_description', \Illuminate\Support\Str::limit(strip_tags($proker->deskripsi), 150))
@section('og_image', $proker->sampul ? asset('storage/'.$proker->sampul) : asset('images/logo.png'))

@section('content')

    <section class="max-w-[900px] mx-auto px-5 sm:px-8 pt-14 pb-16">
        <a href="{{ route('proker.index') }}" class="text-sm text-ink-soft hover:text-brick">&larr; Semua program kerja</a>

        <div class="mt-4 flex items-center gap-2 flex-wrap">
            <span class="status-pill inline-block text-[11px] font-bold uppercase px-2 py-1 rounded
                {{ match($proker->status) {
                    'berlangsung' => 'bg-leaf/15 text-leaf-dark',
                    'selesai' => 'bg-ink/10 text-ink-soft',
                    default => 'bg-bamboo/20 text-ink',
                } }}">
                {{ $proker->status }}
            </span>
            @if ($proker->kategori)
                <span class="text-xs text-ink-soft">{{ $proker->kategori }}</span>
            @endif
        </div>

        <h1 class="font-display text-4xl mt-4 mb-6">{{ $proker->nama_kegiatan }}</h1>

        <dl class="grid sm:grid-cols-2 gap-4 mb-8 text-sm">
            <div>
                <dt class="text-xs uppercase tracking-widest text-ink-soft">Tanggal</dt>
                <dd class="mt-0.5">
                    {{ $proker->tanggal_mulai->translatedFormat('d F Y') }}
                    @if ($proker->tanggal_selesai && !$proker->tanggal_selesai->equalTo($proker->tanggal_mulai))
                        &mdash; {{ $proker->tanggal_selesai->translatedFormat('d F Y') }}
                    @endif
                </dd>
            </div>
            @if ($proker->lokasi)
                <div>
                    <dt class="text-xs uppercase tracking-widest text-ink-soft">Lokasi</dt>
                    <dd class="mt-0.5">{{ $proker->lokasi }}</dd>
                </div>
            @endif
            @if ($proker->penanggung_jawab)
                <div>
                    <dt class="text-xs uppercase tracking-widest text-ink-soft">Penanggung Jawab</dt>
                    <dd class="mt-0.5">{{ $proker->penanggung_jawab }}</dd>
                </div>
            @endif
        </dl>

        @if ($proker->deskripsi)
            <p class="text-ink-soft leading-relaxed whitespace-pre-line">{{ $proker->deskripsi }}</p>
        @endif

        @if ($proker->galeris->isNotEmpty())
            <div class="mt-12">
                <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-4">Dokumentasi</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach ($proker->galeris as $foto)
                        <div class="aspect-square rounded-sm overflow-hidden border border-ink/10 bg-paper-dim">
                            <img src="{{ asset('storage/'.$foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

@endsection

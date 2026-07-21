@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-3">Dokumentasi</p>
        <h1 class="font-display text-4xl mb-4">Galeri Kegiatan</h1>
        <p class="text-ink-soft max-w-2xl">Kumpulan foto dari berbagai kegiatan yang sudah dijalankan D'Fourty.</p>

        @if ($prokerList->isNotEmpty())
            <form method="GET" class="mt-6">
                <select name="proker_id" onchange="this.form.submit()" class="rounded-md border border-ink/15 bg-paper text-sm px-3 py-2">
                    <option value="">Semua kegiatan</option>
                    @foreach ($prokerList as $proker)
                        <option value="{{ $proker->id }}" {{ (string) request('proker_id') === (string) $proker->id ? 'selected' : '' }}>{{ $proker->nama_kegiatan }}</option>
                    @endforeach
                </select>
            </form>
        @endif
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pb-16">
        @if ($galeris->isEmpty())
            <p class="text-ink-soft">Belum ada foto yang cocok dengan filter ini.</p>
        @else
            <div class="columns-2 sm:columns-3 gap-4 space-y-4">
                @foreach ($galeris as $foto)
                    <figure class="break-inside-avoid rounded-sm overflow-hidden border border-ink/10 bg-paper-dim">
                        <img src="{{ asset('storage/'.$foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-auto">
                        <figcaption class="px-3 py-2 text-xs text-ink-soft">
                            <span class="font-medium text-ink">{{ $foto->judul }}</span>
                            @if ($foto->proker)
                                <br>{{ $foto->proker->nama_kegiatan }}
                            @endif
                        </figcaption>
                    </figure>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $galeris->links() }}
            </div>
        @endif
    </section>

@endsection

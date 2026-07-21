@extends('layouts.app')

@section('title', 'Program Kerja')

@section('content')

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-3">Program Kerja</p>
        <h1 class="font-display text-4xl mb-4">Semua kegiatan D'Fourty</h1>
        <p class="text-ink-soft max-w-2xl">Daftar program kerja Karang Taruna, dari rencana sampai yang sudah tuntas dijalankan.</p>

        <form method="GET" class="mt-6 flex flex-wrap gap-3">
            <select name="status" onchange="this.form.submit()" class="rounded-md border border-ink/15 bg-paper text-sm px-3 py-2">
                <option value="">Semua status</option>
                <option value="rencana" {{ request('status') === 'rencana' ? 'selected' : '' }}>Rencana</option>
                <option value="berlangsung" {{ request('status') === 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @if ($kategoriList->isNotEmpty())
                <select name="kategori" onchange="this.form.submit()" class="rounded-md border border-ink/15 bg-paper text-sm px-3 py-2">
                    <option value="">Semua kategori</option>
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') === $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                    @endforeach
                </select>
            @endif
            @if (request('status') || request('kategori'))
                <a href="{{ route('proker.index') }}" class="text-sm text-ink-soft self-center hover:text-brick">Reset filter</a>
            @endif
        </form>
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pb-16">
        @if ($prokers->isEmpty())
            <p class="text-ink-soft">Belum ada program kerja yang cocok dengan filter ini.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($prokers as $i => $proker)
                    <a href="{{ route('proker.show', $proker) }}" class="mading-card mading-tilt-{{ ($i % 3) + 1 }} rounded-sm p-6 block">
                        <span class="status-pill inline-block text-[11px] font-bold uppercase px-2 py-1 rounded
                            {{ match($proker->status) {
                                'berlangsung' => 'bg-leaf/15 text-leaf-dark',
                                'selesai' => 'bg-ink/10 text-ink-soft',
                                default => 'bg-bamboo/20 text-ink',
                            } }}">
                            {{ $proker->status }}
                        </span>
                        @if ($proker->kategori)
                            <span class="text-[11px] text-ink-soft ml-2">{{ $proker->kategori }}</span>
                        @endif
                        <h3 class="font-display text-xl mt-3 mb-2">{{ $proker->nama_kegiatan }}</h3>
                        <p class="text-sm text-ink-soft mb-3">{{ \Illuminate\Support\Str::limit($proker->deskripsi, 90) }}</p>
                        <p class="text-xs text-ink-soft">{{ $proker->tanggal_mulai->translatedFormat('d F Y') }}
                            @if ($proker->lokasi) &middot; {{ $proker->lokasi }} @endif
                        </p>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $prokers->links() }}
            </div>
        @endif
    </section>

@endsection

@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-3">Keanggotaan</p>
                <h1 class="font-display text-4xl mb-3">Anggota D'Fourty</h1>
                <p class="text-ink-soft max-w-2xl">
                    Saat ini tercatat <span class="font-semibold text-ink">{{ $jumlahAktif }} anggota aktif</span>.
                    Data kontak pribadi anggota dikelola secara privat oleh pengurus.
                </p>
            </div>
            <div>
                <a href="{{ route('anggota.daftar') }}" class="inline-block rounded-md bg-brick text-white px-5 py-2.5 text-sm font-semibold hover:bg-brick-dark transition-colors">
                    Daftar Jadi Anggota
                </a>
            </div>
        </div>

        <form method="GET" class="mt-6">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama anggota..."
                class="w-full sm:w-72 rounded-md border border-ink/15 bg-paper text-sm px-3 py-2">
        </form>
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pb-16">
        @if ($anggotas->isEmpty())
            <p class="text-ink-soft">Tidak ada anggota yang cocok dengan pencarian ini.</p>
        @else
            <div class="border border-ink/10 rounded-sm overflow-hidden divide-y divide-ink/10 bg-paper">
                @foreach ($anggotas as $anggota)
                    <div class="flex items-center justify-between px-5 py-4">
                        <div class="flex items-center gap-4">
                            @if($anggota->foto)
                                <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto {{ $anggota->nama }}" class="w-12 h-12 rounded-full object-cover shrink-0">
                            @else
                                <div class="w-12 h-12 rounded-full bg-ink/5 flex items-center justify-center text-ink-soft font-display text-lg shrink-0">
                                    {{ substr($anggota->nama, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <p class="font-medium">{{ $anggota->nama }}</p>
                                @if ($anggota->jabatan)
                                    <p class="text-xs text-brick mt-0.5">{{ $anggota->jabatan }}</p>
                                @endif
                            </div>
                        </div>
                        <span class="text-[11px] uppercase tracking-widest px-2 py-1 rounded {{ $anggota->status === 'aktif' ? 'bg-leaf/15 text-leaf-dark' : 'bg-ink/10 text-ink-soft' }}">
                            {{ $anggota->status }}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $anggotas->links() }}
            </div>
        @endif
    </section>

@endsection

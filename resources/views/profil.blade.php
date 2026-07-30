@extends('layouts.app')

@section('title', 'Profil')

@section('content')

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-6">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-3">Profil Organisasi</p>
        <h1 class="font-display text-4xl mb-6">Karang Taruna D'Fourty</h1>
        <p class="text-ink-soft text-lg leading-relaxed">
            {{ $pengaturan->deskripsi_organisasi }}
        </p>
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 py-10 grid sm:grid-cols-2 gap-8">
        <div class="mading-card mading-tilt-1 rounded-sm p-6">
            <h2 class="font-display text-xl text-leaf mb-2">Visi</h2>
            <p class="text-ink-soft leading-relaxed text-sm">
                {{ $pengaturan->visi }}
            </p>
        </div>
        <div class="mading-card mading-tilt-2 rounded-sm p-6">
            <h2 class="font-display text-xl text-leaf mb-2">Misi</h2>
            <ul class="text-ink-soft leading-relaxed text-sm space-y-1.5 list-disc list-inside">
                @foreach (explode("\n", $pengaturan->misi) as $poin)
                    @if (trim($poin) !== '')
                        <li>{{ trim($poin) }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 py-10">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-6">Struktur Pengurus</p>
        @if ($pengurus->isEmpty())
            <p class="text-ink-soft text-sm">Struktur pengurus belum diisi. Admin bisa mengisi kolom "Jabatan" pada Data Anggota untuk menampilkannya di sini.</p>
        @else
            <div class="grid sm:grid-cols-3 gap-5">
                @foreach ($pengurus as $i => $anggota)
                    <div class="mading-card mading-tilt-{{ ($i % 3) + 1 }} rounded-sm p-5 text-center flex flex-col items-center justify-center">
                        @if($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto {{ $anggota->nama }}" class="w-20 h-20 rounded-full object-cover mb-3 shadow-sm border border-ink/10">
                        @else
                            <div class="w-20 h-20 rounded-full bg-ink/5 flex items-center justify-center text-ink-soft font-display text-2xl mb-3 border border-ink/10">
                                {{ substr($anggota->nama, 0, 1) }}
                            </div>
                        @endif
                        <p class="font-display text-lg leading-tight">{{ $anggota->nama }}</p>
                        <p class="text-xs uppercase tracking-widest text-brick mt-1.5">{{ $anggota->jabatan }}</p>
                    </div>
                @endforeach
            </div>
        @endif
        <p class="text-xs text-ink-soft mt-6">
            Urutan tampil bisa diatur lewat kolom "Urutan di Profil" saat mengubah data anggota di panel admin.
        </p>
    </section>

@endsection

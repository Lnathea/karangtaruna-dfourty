@extends('layouts.app')

@section('title', 'Profil')

@section('content')

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-6">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-3">Profil Organisasi</p>
        <h1 class="font-display text-4xl mb-6">Karang Taruna D'Fourty</h1>
        <p class="text-ink-soft text-lg leading-relaxed">
            D'Fourty adalah organisasi kepemudaan RW 040 Perumahan Panorama Wanasari, Cibitung, Bekasi.
            Berdiri sebagai wadah aspirasi dan kreativitas pemuda-pemudi setempat, kami aktif menggerakkan
            kegiatan sosial, gotong royong lingkungan, olahraga, seni, dan perayaan hari besar nasional
            bersama seluruh warga RW 040.
        </p>
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 py-10 grid sm:grid-cols-2 gap-8">
        <div class="mading-card mading-tilt-1 rounded-sm p-6">
            <h2 class="font-display text-xl text-leaf mb-2">Visi</h2>
            <p class="text-ink-soft leading-relaxed text-sm">
                Menjadi wadah pemuda-pemudi RW 040 yang solid, kreatif, dan aktif berkontribusi
                bagi kemajuan lingkungan serta kesejahteraan warga.
            </p>
        </div>
        <div class="mading-card mading-tilt-2 rounded-sm p-6">
            <h2 class="font-display text-xl text-leaf mb-2">Misi</h2>
            <ul class="text-ink-soft leading-relaxed text-sm space-y-1.5 list-disc list-inside">
                <li>Menghimpun dan mengembangkan potensi pemuda-pemudi RW 040.</li>
                <li>Menyelenggarakan kegiatan sosial, olahraga, dan seni budaya secara rutin.</li>
                <li>Mendorong gotong royong dan kepedulian terhadap lingkungan.</li>
                <li>Menjadi jembatan komunikasi antara pemuda dan pengurus RT/RW.</li>
            </ul>
        </div>
    </section>

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 py-10">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-6">Struktur Pengurus</p>
        @if($pengurus->isEmpty())
            <p class="text-ink-soft">Data struktur pengurus belum tersedia.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($pengurus as $index => $p)
                    @php
                        $tiltClass = 'mading-tilt-' . (($index % 3) + 1);
                    @endphp
                    <div class="mading-card {{ $tiltClass }} rounded-sm p-5 text-center flex flex-col items-center justify-center">
                        @if($p->foto)
                            <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto {{ $p->nama }}" class="w-20 h-20 rounded-full object-cover mb-3 shadow-sm border border-ink/10">
                        @else
                            <div class="w-20 h-20 rounded-full bg-ink/5 flex items-center justify-center text-ink-soft font-display text-2xl mb-3 border border-ink/10">
                                {{ substr($p->nama, 0, 1) }}
                            </div>
                        @endif
                        <p class="font-display text-lg leading-tight">{{ $p->nama }}</p>
                        <p class="text-xs uppercase tracking-widest text-brick mt-1.5">{{ $p->jabatan }}</p>
                    </div>
                @endforeach
            </div>
        @endif
        <p class="text-xs text-ink-soft mt-6">
            Struktur lengkap dapat diperbarui oleh admin melalui data pada halaman
            <a href="{{ route('anggota.index') }}" class="text-brick hover:underline">Data Anggota</a>.
        </p>
    </section>

@endsection

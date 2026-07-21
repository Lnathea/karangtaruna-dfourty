@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <p class="text-ink-soft text-sm">Kelola foto dokumentasi kegiatan.</p>
        <a href="{{ route('admin.galeri.create') }}" class="rounded-md bg-brick text-white px-4 py-2 text-sm font-semibold hover:bg-brick-dark transition-colors">+ Unggah Foto</a>
    </div>

    @if ($galeris->isEmpty())
        <p class="text-ink-soft text-sm">Belum ada foto yang diunggah.</p>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($galeris as $foto)
                <div class="bg-white/60 border border-ink/10 rounded-sm overflow-hidden">
                    <div class="aspect-square bg-paper-dim">
                        <img src="{{ asset('storage/'.$foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <p class="font-medium text-sm">{{ $foto->judul }}</p>
                        @if ($foto->proker)
                            <p class="text-xs text-ink-soft mt-0.5">{{ $foto->proker->nama_kegiatan }}</p>
                        @endif
                        <div class="mt-3 flex items-center gap-3 text-sm">
                            <a href="{{ route('admin.galeri.edit', $foto) }}" class="text-leaf hover:text-leaf-dark font-medium">Ubah</a>
                            <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-brick hover:text-brick-dark font-medium">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $galeris->links() }}
        </div>
    @endif

@endsection

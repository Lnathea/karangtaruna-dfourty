@extends('layouts.admin')

@section('title', 'Program Kerja')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <p class="text-ink-soft text-sm">Kelola semua program kerja Karang Taruna.</p>
        <a href="{{ route('admin.proker.create') }}" class="rounded-md bg-brick text-white px-4 py-2 text-sm font-semibold hover:bg-brick-dark transition-colors">+ Tambah Proker</a>
    </div>

    <div class="bg-white/60 border border-ink/10 rounded-sm overflow-hidden">
        @if ($prokers->isEmpty())
            <p class="px-5 py-6 text-ink-soft text-sm">Belum ada proker yang tercatat.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-paper-dim/60 text-left text-xs uppercase tracking-widest text-ink-soft">
                    <tr>
                        <th class="px-5 py-3">Nama Kegiatan</th>
                        <th class="px-5 py-3">Tanggal</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-ink/10">
                    @foreach ($prokers as $proker)
                        <tr>
                            <td class="px-5 py-3">
                                <p class="font-medium">{{ $proker->nama_kegiatan }}</p>
                                @if ($proker->kategori)
                                    <p class="text-xs text-ink-soft">{{ $proker->kategori }}</p>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-ink-soft">{{ $proker->tanggal_mulai->translatedFormat('d M Y') }}</td>
                            <td class="px-5 py-3">
                                <span class="text-[11px] uppercase tracking-widest px-2 py-1 rounded
                                    {{ match($proker->status) {
                                        'berlangsung' => 'bg-leaf/15 text-leaf-dark',
                                        'selesai' => 'bg-ink/10 text-ink-soft',
                                        default => 'bg-bamboo/20 text-ink',
                                    } }}">
                                    {{ $proker->status }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('proker.show', $proker) }}" class="text-ink-soft hover:text-brick">Lihat</a>
                                <a href="{{ route('admin.proker.edit', $proker) }}" class="text-leaf hover:text-leaf-dark font-medium">Ubah</a>
                                <form action="{{ route('admin.proker.destroy', $proker) }}" method="POST" class="inline" onsubmit="return confirm('Hapus proker ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-brick hover:text-brick-dark font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="mt-6">
        {{ $prokers->links() }}
    </div>

@endsection

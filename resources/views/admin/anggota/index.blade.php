@extends('layouts.admin')

@section('title', 'Data Anggota')

@section('content')

    <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
        <form method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama anggota..."
                class="w-64 rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </form>
        <a href="{{ route('admin.anggota.create') }}" class="rounded-md bg-brick text-white px-4 py-2 text-sm font-semibold hover:bg-brick-dark transition-colors">+ Tambah Anggota</a>
    </div>

    <div class="bg-white/60 border border-ink/10 rounded-sm overflow-hidden overflow-x-auto">
        @if ($anggotas->isEmpty())
            <p class="px-5 py-6 text-ink-soft text-sm">Belum ada anggota yang tercatat.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-paper-dim/60 text-left text-xs uppercase tracking-widest text-ink-soft">
                    <tr>
                        <th class="px-5 py-3 w-16">Foto</th>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">Jabatan</th>
                        <th class="px-5 py-3">Alamat</th>
                        <th class="px-5 py-3">RT/RW</th>
                        <th class="px-5 py-3">No. HP</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-ink/10">
                    @foreach ($anggotas as $anggota)
                        <tr>
                            <td class="px-5 py-3">
                                @if($anggota->foto)
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto {{ $anggota->nama }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-ink/5 flex items-center justify-center text-ink-soft font-medium text-xs">
                                        {{ substr($anggota->nama, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-5 py-3 font-medium whitespace-nowrap">{{ $anggota->nama }}</td>
                            <td class="px-5 py-3 text-ink-soft">{{ $anggota->jabatan ?: '—' }}</td>
                            <td class="px-5 py-3 text-ink-soft truncate max-w-[200px]" title="{{ $anggota->alamat }}">{{ $anggota->alamat ?: '—' }}</td>
                            <td class="px-5 py-3 text-ink-soft">{{ $anggota->rt_rw ?: '—' }}</td>
                            <td class="px-5 py-3 text-ink-soft">{{ $anggota->no_hp ?: '—' }}</td>
                            <td class="px-5 py-3">
                                <span class="text-[11px] uppercase tracking-widest px-2 py-1 rounded {{ $anggota->status === 'aktif' ? 'bg-leaf/15 text-leaf-dark' : 'bg-ink/10 text-ink-soft' }}">
                                    {{ $anggota->status }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.anggota.edit', $anggota) }}" class="text-leaf hover:text-leaf-dark font-medium">Ubah</a>
                                <form action="{{ route('admin.anggota.destroy', $anggota) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data anggota ini?');">
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
        {{ $anggotas->links() }}
    </div>

@endsection

@extends('layouts.admin')

@section('title', $proker->exists ? 'Ubah Proker' : 'Tambah Proker')

@section('content')

    <form method="POST"
          action="{{ $proker->exists ? route('admin.proker.update', $proker) : route('admin.proker.store') }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white/60 border border-ink/10 rounded-sm p-6 space-y-5">
        @csrf
        @if ($proker->exists) @method('PUT') @endif

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $proker->nama_kegiatan) }}" required
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $proker->kategori) }}" placeholder="mis. Lomba 17-an, Sosial"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Status</label>
                <select name="status" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
                    @foreach (['rencana' => 'Rencana', 'berlangsung' => 'Berlangsung', 'selesai' => 'Selesai'] as $value => $label)
                        <option value="{{ $value }}" {{ old('status', $proker->status ?? 'rencana') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', optional($proker->tanggal_mulai)->format('Y-m-d')) }}" required
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', optional($proker->tanggal_selesai)->format('Y-m-d')) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $proker->lokasi) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" value="{{ old('penanggung_jawab', $proker->penanggung_jawab) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">{{ old('deskripsi', $proker->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Foto Sampul</label>
            @if ($proker->sampul)
                <img src="{{ asset('storage/'.$proker->sampul) }}" class="w-32 h-32 object-cover rounded-sm mb-2 border border-ink/10">
            @endif
            <input type="file" name="sampul" accept="image/*" class="w-full text-sm">
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="rounded-md bg-brick text-white px-5 py-2.5 text-sm font-semibold hover:bg-brick-dark transition-colors">
                {{ $proker->exists ? 'Simpan Perubahan' : 'Tambah Proker' }}
            </button>
            <a href="{{ route('admin.proker.index') }}" class="text-sm text-ink-soft hover:text-brick">Batal</a>
        </div>
    </form>

@endsection

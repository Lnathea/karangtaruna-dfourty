@extends('layouts.admin')

@section('title', $galeri->exists ? 'Ubah Foto' : 'Unggah Foto')

@section('content')

    <form method="POST"
          action="{{ $galeri->exists ? route('admin.galeri.update', $galeri) : route('admin.galeri.store') }}"
          enctype="multipart/form-data"
          class="max-w-xl bg-white/60 border border-ink/10 rounded-sm p-6 space-y-5">
        @csrf
        @if ($galeri->exists) @method('PUT') @endif

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Judul Foto</label>
            <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Terkait Proker (opsional)</label>
            <select name="proker_id" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
                <option value="">— Tidak terkait —</option>
                @foreach ($prokerList as $proker)
                    <option value="{{ $proker->id }}" {{ (string) old('proker_id', $galeri->proker_id) === (string) $proker->id ? 'selected' : '' }}>
                        {{ $proker->nama_kegiatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', optional($galeri->tanggal)->format('Y-m-d')) }}"
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">
                Foto {{ $galeri->exists ? '(kosongkan jika tidak diganti)' : '' }}
            </label>
            @if ($galeri->foto)
                <img src="{{ asset('storage/'.$galeri->foto) }}" class="w-32 h-32 object-cover rounded-sm mb-2 border border-ink/10">
            @endif
            <input type="file" name="foto" accept="image/*" {{ $galeri->exists ? '' : 'required' }} class="w-full text-sm">
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="rounded-md bg-brick text-white px-5 py-2.5 text-sm font-semibold hover:bg-brick-dark transition-colors">
                {{ $galeri->exists ? 'Simpan Perubahan' : 'Unggah Foto' }}
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="text-sm text-ink-soft hover:text-brick">Batal</a>
        </div>
    </form>

@endsection

@extends('layouts.admin')

@section('title', $anggota->exists ? 'Ubah Anggota' : 'Tambah Anggota')

@section('content')

    <form method="POST"
          action="{{ $anggota->exists ? route('admin.anggota.update', $anggota) : route('admin.anggota.store') }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white/60 border border-ink/10 rounded-sm p-6 space-y-5">
        @csrf
        @if ($anggota->exists) @method('PUT') @endif

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" required
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
                    <option value="L" {{ old('jenis_kelamin', $anggota->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $anggota->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Status Keanggotaan</label>
                <select name="status" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
                    <option value="aktif" {{ old('status', $anggota->status ?? 'aktif') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $anggota->status ?? 'aktif') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Jabatan (opsional)</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}" placeholder="mis. Ketua, Sekretaris"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">RT/RW</label>
                <input type="text" name="rt_rw" value="{{ old('rt_rw', $anggota->rt_rw) }}" placeholder="mis. RT 003/RW 040"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">No. HP / WhatsApp</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $anggota->no_hp) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Tanggal Bergabung</label>
                <input type="date" name="tanggal_bergabung" value="{{ old('tanggal_bergabung', optional($anggota->tanggal_bergabung)->format('Y-m-d')) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $anggota->alamat) }}"
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Catatan (opsional)</label>
            <textarea name="catatan" rows="3" class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">{{ old('catatan', $anggota->catatan) }}</textarea>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Foto (opsional)</label>
            @if ($anggota->foto)
                <img src="{{ asset('storage/'.$anggota->foto) }}" class="w-24 h-24 object-cover rounded-full mb-2 border border-ink/10">
            @endif
            <input type="file" name="foto" accept="image/*" class="w-full text-sm">
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="rounded-md bg-brick text-white px-5 py-2.5 text-sm font-semibold hover:bg-brick-dark transition-colors">
                {{ $anggota->exists ? 'Simpan Perubahan' : 'Tambah Anggota' }}
            </button>
            <a href="{{ route('admin.anggota.index') }}" class="text-sm text-ink-soft hover:text-brick">Batal</a>
        </div>
    </form>

@endsection

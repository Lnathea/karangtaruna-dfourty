@extends('layouts.app')

@section('title', 'Daftar Jadi Anggota')

@section('content')

    <section class="max-w-[1600px] mx-auto px-5 sm:px-8 pt-14 pb-8">
        <p class="text-xs uppercase tracking-[0.2em] text-brick font-semibold mb-3">Keanggotaan</p>
        <h1 class="font-display text-4xl mb-3">Daftar Jadi Anggota</h1>
        <p class="text-ink-soft max-w-2xl">
            Isi form di bawah untuk mendaftar sebagai anggota Karang Taruna D'Fourty. Pendaftaran kamu akan diverifikasi oleh pengurus sebelum aktif.
        </p>
    </section>

    <section class="max-w-2xl mx-auto px-5 sm:px-8 pb-16">
        @if (session('status'))
            <div class="mb-6 p-4 rounded-md bg-leaf/15 border border-leaf/30 text-leaf-dark text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-paper border border-ink/10 rounded-lg p-6 sm:p-8 shadow-sm">
            <form action="{{ route('anggota.daftar.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Honeypot anti-spam --}}
                <input type="text" name="website" style="position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">

                <div>
                    <label for="nama" class="block text-sm font-semibold text-ink mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        class="w-full rounded-md border border-ink/20 bg-paper text-sm px-3.5 py-2.5 focus:border-brick focus:ring-1 focus:ring-brick transition-colors @error('nama') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap">
                    @error('nama')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jenis_kelamin" class="block text-sm font-semibold text-ink mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="w-full rounded-md border border-ink/20 bg-paper text-sm px-3.5 py-2.5 focus:border-brick focus:ring-1 focus:ring-brick transition-colors @error('jenis_kelamin') border-red-500 @enderror">
                        <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih jenis kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="no_hp" class="block text-sm font-semibold text-ink mb-1">No. HP / WhatsApp <span class="text-red-500">*</span></label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required
                        class="w-full rounded-md border border-ink/20 bg-paper text-sm px-3.5 py-2.5 focus:border-brick focus:ring-1 focus:ring-brick transition-colors @error('no_hp') border-red-500 @enderror"
                        placeholder="Contoh: 081234567890">
                    @error('no_hp')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-semibold text-ink mb-1">Alamat <span class="text-red-500">*</span></label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                        class="w-full rounded-md border border-ink/20 bg-paper text-sm px-3.5 py-2.5 focus:border-brick focus:ring-1 focus:ring-brick transition-colors @error('alamat') border-red-500 @enderror"
                        placeholder="Contoh: Jl. Panorama 3 No. 12">
                    @error('alamat')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="rt_rw" class="block text-sm font-semibold text-ink mb-1">RT/RW (opsional)</label>
                    <input type="text" id="rt_rw" name="rt_rw" value="{{ old('rt_rw') }}"
                        class="w-full rounded-md border border-ink/20 bg-paper text-sm px-3.5 py-2.5 focus:border-brick focus:ring-1 focus:ring-brick transition-colors @error('rt_rw') border-red-500 @enderror"
                        placeholder="Contoh: 001/040">
                    @error('rt_rw')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-md bg-brick text-white px-5 py-3 text-sm font-semibold hover:bg-brick-dark transition-colors shadow-sm cursor-pointer">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection

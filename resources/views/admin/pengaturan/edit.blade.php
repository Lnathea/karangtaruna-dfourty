@extends('layouts.admin')

@section('title', 'Pengaturan Situs')

@section('content')

    <form method="POST" action="{{ route('admin.pengaturan.update') }}"
          class="max-w-2xl bg-white border-t-4 border-leaf rounded-sm shadow-sm p-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Deskripsi Organisasi</label>
            <textarea name="deskripsi_organisasi" rows="3"
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">{{ old('deskripsi_organisasi', $pengaturan->deskripsi_organisasi) }}</textarea>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Visi</label>
            <textarea name="visi" rows="2"
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">{{ old('visi', $pengaturan->visi) }}</textarea>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Misi <span class="normal-case font-normal">(satu poin per baris)</span></label>
            <textarea name="misi" rows="4"
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">{{ old('misi', $pengaturan->misi) }}</textarea>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $pengaturan->alamat) }}"
                class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Link Instagram</label>
                <input type="text" name="instagram_url" value="{{ old('instagram_url', $pengaturan->instagram_url) }}"
                    placeholder="https://instagram.com/..."
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Link TikTok</label>
                <input type="text" name="tiktok_url" value="{{ old('tiktok_url', $pengaturan->tiktok_url) }}"
                    placeholder="https://tiktok.com/@..."
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Email Kontak</label>
                <input type="email" name="email_kontak" value="{{ old('email_kontak', $pengaturan->email_kontak) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest text-ink-soft mb-1">No. WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $pengaturan->whatsapp) }}"
                    class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
            </div>
        </div>

        <button type="submit"
            class="rounded-md bg-brick text-white px-5 py-2.5 text-sm font-semibold hover:bg-brick-dark transition-colors">
            Simpan Pengaturan
        </button>
    </form>

@endsection

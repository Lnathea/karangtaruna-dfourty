<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::with('proker')->latest('tanggal')->paginate(12);

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        $prokerList = Proker::orderBy('nama_kegiatan')->get();

        return view('admin.galeri.form', ['galeri' => new Galeri(), 'prokerList' => $prokerList]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'proker_id' => ['nullable', 'exists:prokers,id'],
            'tanggal' => ['nullable', 'date'],
            'foto' => ['required', 'image', 'max:4096'],
        ]);

        $data['foto'] = $request->file('foto')->store('galeri', 'public');

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('status', 'Foto berhasil diunggah ke galeri.');
    }

    public function edit(Galeri $galeri)
    {
        $prokerList = Proker::orderBy('nama_kegiatan')->get();

        return view('admin.galeri.form', compact('galeri', 'prokerList'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'proker_id' => ['nullable', 'exists:prokers,id'],
            'tanggal' => ['nullable', 'date'],
            'foto' => ['nullable', 'image', 'max:4096'],
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($galeri->foto);
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('status', 'Data foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('status', 'Foto berhasil dihapus.');
    }
}

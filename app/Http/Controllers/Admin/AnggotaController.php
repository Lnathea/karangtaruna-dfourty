<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query()->orderBy('nama');

        if ($request->filled('cari')) {
            $query->where('nama', 'like', '%'.$request->string('cari').'%');
        }

        $anggotas = $query->paginate(15)->withQueryString();

        return view('admin.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggota.form', ['anggota' => new Anggota()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        Anggota::create($data);

        return redirect()->route('admin.anggota.index')->with('status', 'Anggota baru berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.form', ['anggota' => $anggota]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            if ($anggota->foto) {
                Storage::disk('public')->delete($anggota->foto);
            }
            $data['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        $anggota->update($data);

        return redirect()->route('admin.anggota.index')->with('status', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        if ($anggota->foto) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('admin.anggota.index')->with('status', 'Data anggota berhasil dihapus.');
    }

    public function verify(Anggota $anggota)
    {
        $anggota->update(['status' => 'aktif']);

        return redirect()->route('admin.anggota.index')->with('status', "Pendaftaran {$anggota->nama} berhasil diverifikasi dan diaktifkan.");
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'rt_rw' => ['nullable', 'string', 'max:20'],
            'jabatan' => ['nullable', 'string', 'max:100'],
            'status' => ['required', 'in:aktif,nonaktif'],
            'tanggal_bergabung' => ['nullable', 'date'],
            'foto' => ['nullable', 'image', 'max:4096'],
            'catatan' => ['nullable', 'string'],
        ]);
    }
}

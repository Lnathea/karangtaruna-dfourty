<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProkerController extends Controller
{
    public function index()
    {
        $prokers = Proker::orderBy('tanggal_mulai', 'desc')->paginate(10);

        return view('admin.proker.index', compact('prokers'));
    }

    public function create()
    {
        return view('admin.proker.form', ['proker' => new Proker()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('sampul')) {
            $data['sampul'] = $request->file('sampul')->store('proker', 'public');
        }

        Proker::create($data);

        return redirect()->route('admin.proker.index')->with('status', 'Proker baru berhasil ditambahkan.');
    }

    public function edit(Proker $proker)
    {
        return view('admin.proker.form', compact('proker'));
    }

    public function update(Request $request, Proker $proker)
    {
        $data = $this->validated($request);

        if ($request->hasFile('sampul')) {
            if ($proker->sampul) {
                Storage::disk('public')->delete($proker->sampul);
            }
            $data['sampul'] = $request->file('sampul')->store('proker', 'public');
        }

        $proker->update($data);

        return redirect()->route('admin.proker.index')->with('status', 'Proker berhasil diperbarui.');
    }

    public function destroy(Proker $proker)
    {
        if ($proker->sampul) {
            Storage::disk('public')->delete($proker->sampul);
        }

        $proker->delete();

        return redirect()->route('admin.proker.index')->with('status', 'Proker berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'kategori' => ['nullable', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'penanggung_jawab' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:rencana,berlangsung,selesai'],
            'sampul' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}

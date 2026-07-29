<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('anggota.daftar');
    }

    public function store(Request $request)
    {
        // Honeypot anti-spam sederhana: field ini disembunyikan lewat CSS,
        // manusia tidak akan mengisinya, tapi bot form-filler biasanya mengisi semua field.
        if ($request->filled('website')) {
            return redirect()->route('anggota.daftar')->with('status', 'Pendaftaran berhasil dikirim.');
        }

        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:255'],
            'rt_rw' => ['nullable', 'string', 'max:20'],
        ]);

        $data['status'] = 'nonaktif';
        $data['sumber'] = 'mandiri';
        $data['tanggal_bergabung'] = now();

        Anggota::create($data);

        return redirect()->route('anggota.daftar')->with('status', 'Terima kasih! Pendaftaran kamu sudah kami terima dan sedang menunggu verifikasi pengurus.');
    }
}

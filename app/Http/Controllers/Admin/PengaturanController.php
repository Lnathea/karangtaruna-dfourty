<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function edit()
    {
        $pengaturan = Pengaturan::current();

        return view('admin.pengaturan.edit', compact('pengaturan'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'deskripsi_organisasi' => ['nullable', 'string'],
            'visi'                 => ['nullable', 'string'],
            'misi'                 => ['nullable', 'string'],
            'alamat'               => ['nullable', 'string', 'max:255'],
            'instagram_url'        => ['nullable', 'string', 'max:255'],
            'tiktok_url'           => ['nullable', 'string', 'max:255'],
            'email_kontak'         => ['nullable', 'email', 'max:255'],
            'whatsapp'             => ['nullable', 'string', 'max:30'],
        ]);

        Pengaturan::current()->update($data);

        return back()->with('status', 'Pengaturan situs berhasil disimpan.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query()->orderBy('nama');

        if ($request->filled('cari')) {
            $query->where('nama', 'like', '%'.$request->string('cari').'%');
        }

        $anggotas = $query->paginate(20)->withQueryString();
        $jumlahAktif = Anggota::aktif()->count();

        return view('anggota.index', compact('anggotas', 'jumlahAktif'));
    }
}

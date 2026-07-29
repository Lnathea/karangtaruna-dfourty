<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Galeri;
use App\Models\Proker;

class HomeController extends Controller
{
    public function index()
    {
        $prokerBerjalan = Proker::whereIn('status', ['rencana', 'berlangsung'])
            ->orderBy('tanggal_mulai')
            ->take(3)
            ->get();

        $galeriTerbaru = Galeri::latest('tanggal')->take(6)->get();

        $prokerPuncak = Proker::where('nama_kegiatan', 'like', '%Malam Puncak%')
            ->whereIn('status', ['rencana', 'berlangsung'])
            ->orderBy('tanggal_mulai')
            ->first();

        $stat = [
            'anggota_aktif' => Anggota::aktif()->count(),
            'proker_berjalan' => Proker::whereIn('status', ['rencana', 'berlangsung'])->count(),
            'proker_selesai' => Proker::where('status', 'selesai')->count(),
        ];

        return view('home', compact('prokerBerjalan', 'galeriTerbaru', 'stat', 'prokerPuncak'));
    }

    public function profil()
    {
        $pengurus = Anggota::whereNotNull('jabatan')
            ->where('jabatan', '!=', '')
            ->where('status', 'aktif')
            ->orderByRaw('urutan_jabatan IS NULL, urutan_jabatan ASC')
            ->orderBy('nama')
            ->get();

        return view('profil', compact('pengurus'));
    }
}

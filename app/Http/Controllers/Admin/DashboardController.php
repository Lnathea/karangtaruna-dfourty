<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Galeri;
use App\Models\Proker;

class DashboardController extends Controller
{
    public function index()
    {
        $stat = [
            'anggota_aktif' => Anggota::aktif()->count(),
            'anggota_total' => Anggota::count(),
            'proker_berjalan' => Proker::whereIn('status', ['rencana', 'berlangsung'])->count(),
            'proker_selesai' => Proker::where('status', 'selesai')->count(),
            'galeri_total' => Galeri::count(),
        ];

        $prokerTerbaru = Proker::latest()->take(5)->get();

        $menungguVerifikasi = Anggota::where('sumber', 'mandiri')
            ->where('status', 'nonaktif')
            ->latest()
            ->get();

        $galeriTerbaru = Galeri::latest('tanggal')->take(4)->get();

        return view('admin.dashboard', compact('stat', 'prokerTerbaru', 'menungguVerifikasi', 'galeriTerbaru'));
    }
}

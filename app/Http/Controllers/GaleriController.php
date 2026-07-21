<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Proker;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query()->with('proker')->orderBy('tanggal', 'desc');

        if ($request->filled('proker_id')) {
            $query->where('proker_id', $request->integer('proker_id'));
        }

        $galeris = $query->paginate(12)->withQueryString();
        $prokerList = Proker::orderBy('nama_kegiatan')->get();

        return view('galeri.index', compact('galeris', 'prokerList'));
    }
}

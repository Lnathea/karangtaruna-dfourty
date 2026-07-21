<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;

class ProkerController extends Controller
{
    public function index(Request $request)
    {
        $query = Proker::query()->orderBy('tanggal_mulai', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->string('kategori'));
        }

        $prokers = $query->paginate(9)->withQueryString();
        $kategoriList = Proker::query()->whereNotNull('kategori')->distinct()->pluck('kategori');

        return view('proker.index', compact('prokers', 'kategoriList'));
    }

    public function show(Proker $proker)
    {
        $proker->load('galeris');

        return view('proker.show', compact('proker'));
    }
}

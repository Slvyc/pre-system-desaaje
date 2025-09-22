<?php

namespace App\Http\Controllers;

use App\Models\Berita;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal_berita', 'desc')->paginate(6);
        return view('modul-berita.berita', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        $berita->increment('views');

        $previews = Berita::where('id', '!=', $berita->id)
            ->latest('tanggal_berita')
            ->take(5) // Ambil 5 berita terbaru saja
            ->get();
        return view('modul-berita.detail-berita', compact('berita', 'previews'));
    }
}

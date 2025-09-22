<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $potensis = PotensiDesa::orderBy('tanggal_potensi', 'desc')->paginate(6);
        return view('modul-potensi.potensi', compact('potensis'));
    }

    public function show(PotensiDesa $potensi)
    {
        $potensi->increment('views');

        $previews = PotensiDesa::where('id', '!=', $potensi->id)
            ->latest('tanggal_potensi')
            ->take(5)
            ->get();
        return view('modul-potensi.detail-potensi', compact('potensi', 'previews'));
    }
}

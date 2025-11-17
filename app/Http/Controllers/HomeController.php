<?php

namespace App\Http\Controllers;

use App\Models\AparatDesa;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\StatistikDesa;
use App\Models\Uraian;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $aparats = AparatDesa::orderBy('created_at', 'desc')->paginate(6);
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(6);
        $galeris = Galeri::orderBy('created_at', 'desc')->paginate(3);
        $produks = Produk::orderBy('created_at', 'desc')->paginate(3);
        $umums = StatistikDesa::all();

        // Dana Desa Tahun Terbaru
        $tahunTerbaru = Uraian::max('tahun');

        // Ambil semua uraian untuk tahun yang dipilih
        $uraian = Uraian::with(['kategori', 'anggaranTerealisasi'])
            ->where('tahun', $tahunTerbaru)
            ->get();

        $getTotal = fn($kategori) =>
        $uraian->where('kategori.nama_kategori', $kategori)
            ->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0);

        return view('home', [
            'aparats' => $aparats,
            'beritas' => $beritas,
            'galeris' => $galeris,
            'produks' => $produks,
            'umums' => $umums,
            'uraian' => $uraian,
            'tahunTerbaru' => $tahunTerbaru,
            'totalPendapatan' => $getTotal('Pendapatan'),
            'totalBelanja' => $getTotal('Belanja'),
            'totalPembiayaan' => $getTotal('Pembiayaan'),
        ]);
    }
}

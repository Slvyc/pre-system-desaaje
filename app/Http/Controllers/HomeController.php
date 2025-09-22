<?php

namespace App\Http\Controllers;

use App\Models\AparatDesa;
use App\Models\Berita;
use App\Models\Galeri;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $aparats = AparatDesa::orderBy('created_at', 'desc')->paginate(6);
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(6);
        $galeris = Galeri::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('aparats', 'beritas', 'galeris'));
    }
}

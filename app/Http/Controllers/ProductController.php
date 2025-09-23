<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('created_at', 'desc')->paginate(8);
        return view('modul-produk.produk', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('modul-produk.detail-produk', compact('produk'));
    }
}

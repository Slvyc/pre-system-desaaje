<?php

namespace App\Http\Controllers;

use App\Models\BaganDesa;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\StatistikDesa;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::first();
        $sejarah = Sejarah::first();
        $baganDesa = BaganDesa::first();
        $umums = StatistikDesa::all();

        
        return view('profile', compact('visimisi', 'sejarah', 'baganDesa'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::first();
        return view('profile', compact('visimisi'));
    }
}

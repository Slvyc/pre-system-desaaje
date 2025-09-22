<?php

namespace App\Http\Controllers;

use App\Models\AparatDesa;
use Illuminate\Http\Request;

class AparatDesaController extends Controller
{
    public function index()
    {
        $aparats = AparatDesa::all();
        return view('sotk', compact('aparats'));
    }
}

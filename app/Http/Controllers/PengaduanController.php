<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduan');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string',
            'kategori_pengaduan' => 'required|in:Umum,Sosial,Keamanan,Kesehatan,Kebersihan,Permintaan',
            'isi_pengaduan' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // Max 2MB
        ]);

        $pengaduan = new Pengaduan();
        $pengaduan->nama = $validatedData['nama'];
        $pengaduan->no_hp = $validatedData['no_hp'];
        $pengaduan->kategori_pengaduan = $validatedData['kategori_pengaduan'];
        $pengaduan->isi_pengaduan = $validatedData['isi_pengaduan'];

        // Handle File Upload (Jika ada)
        if ($request->hasFile('lampiran')) {
            // Simpan file di 'storage/app/public/lampiran_pengaduan' dan dapatkan path relatifnya
            $path = $request->file('lampiran')->store('lampiran_pengaduan', 'public');
            $pengaduan->lampiran = $path; // Path yang tersimpan: 'lampiran_pengaduan/namafile.ext'
        }

        $pengaduan->save();

        return back()->with('success', 'Pengaduan Anda berhasil dikirim!');
    }
}

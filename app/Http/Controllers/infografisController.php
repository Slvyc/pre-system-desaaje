<?php

namespace App\Http\Controllers;

use App\Models\AnggaranTerealisasi;
use App\Models\DataStunting;
use App\Models\StatistikDesa;
use App\Models\StatistikDusun;
use App\Models\StatistikKelompokUmur;
use App\Models\StatistikPendidikan;
use App\Models\Uraian;
use App\Models\JenisBansos;
use App\Models\PendudukBansos;
use App\Models\RincianAnggaran;
use App\Models\Stunting;
use Illuminate\Http\Request;

class infografisController extends Controller
{
    public function indexPenduduk()
    {
        // Umum
        $umums = StatistikDesa::all();

        // Kelompok Umur
        $kelompokUmur = StatistikKelompokUmur::orderBy('id')->get();
        $umurChartLabels = $kelompokUmur->pluck('rentang_umur');
        $umurChartData = $kelompokUmur->pluck('jumlah');

        // Dusun
        $dusun = StatistikDusun::all();
        $dusunChartLabels = $dusun->pluck('nama_dusun');
        $dusunChartData = $dusun->pluck('jumlah_penduduk');

        // Pendidikan
        $pendidikan = StatistikPendidikan::all();
        $pendidikanChartLabels = $pendidikan->pluck('nama_statistik');
        $pendidikanChartData = $pendidikan->pluck('nilai');

        return view('infografis.penduduk', [
            'dataUmum' => $umums,
            'dataKelompokUmur' => $kelompokUmur,
            'umurChartLabels' => $umurChartLabels,
            'umurChartData' => $umurChartData,
            'dusunChartLabels' => $dusunChartLabels,
            'dusunChartData' => $dusunChartData,
            'pendidikanChartLabels' => $pendidikanChartLabels,
            'pendidikanChartData' => $pendidikanChartData,
        ]);
    }

    // public function indexStunting()
    // {
    //     // Ambil semua kategori stunting
    //     $kategoris = Stunting::orderBy('id')->get();

    //     if ($kategoris->isEmpty()) {
    //         dd('❌ Tidak ada data kategori stunting! Jalankan seeder.');
    //     }

    //     // Ambil data stunting untuk tahun 2023 dan 2024
    //     $dataStunting2023 = DataStunting::where('tahun', 2023)
    //         ->with('kategoriStunting')
    //         ->get()
    //         ->keyBy('kategori_stunting_id');

    //     $dataStunting2024 = DataStunting::where('tahun', 2024)
    //         ->with('kategoriStunting')
    //         ->get()
    //         ->keyBy('kategori_stunting_id');

    //     // Siapkan data untuk chart
    //     $labels = [];
    //     $data2023 = [];
    //     $data2024 = [];

    //     foreach ($kategoris as $kategori) {
    //         $labels[] = $kategori->nama_kategori;
    //         $data2023[] = isset($dataStunting2023[$kategori->id]) ? $dataStunting2023[$kategori->id]->jumlah : 0;
    //         $data2024[] = isset($dataStunting2024[$kategori->id]) ? $dataStunting2024[$kategori->id]->jumlah : 0;
    //     }

    //     // Pastikan variabel ini dikirim ke view
    //     return view('infografis.stunting', [
    //         'labels' => $labels,
    //         'data2023' => $data2023,
    //         'data2024' => $data2024
    //     ]);
    // }


    public function indexStunting(Request $request)
    {
        // Ambil semua tahun yang tersedia
        $availableYears = DataStunting::distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        // Ambil tahun dari request atau default ke 2 tahun terakhir
        $tahun1 = $request->input('tahun1', $availableYears->get(1) ?? 2023);
        $tahun2 = $request->input('tahun2', $availableYears->get(0) ?? 2024);

        // Ambil semua kategori stunting
        $kategoris = Stunting::orderBy('id')->get();

        // Ambil data stunting untuk tahun yang dipilih
        $dataStuntingTahun1 = DataStunting::where('tahun', $tahun1)
            ->with('kategoriStunting')
            ->get()
            ->keyBy('kategori_stunting_id');

        $dataStuntingTahun2 = DataStunting::where('tahun', $tahun2)
            ->with('kategoriStunting')
            ->get()
            ->keyBy('kategori_stunting_id');

        // Siapkan data untuk chart
        $labels = [];
        $dataTahun1 = [];
        $dataTahun2 = [];

        foreach ($kategoris as $kategori) {
            $labels[] = $kategori->nama_kategori;
            $dataTahun1[] = isset($dataStuntingTahun1[$kategori->id])
                ? $dataStuntingTahun1[$kategori->id]->jumlah
                : 0;
            $dataTahun2[] = isset($dataStuntingTahun2[$kategori->id])
                ? $dataStuntingTahun2[$kategori->id]->jumlah
                : 0;
        }

        return view('infografis.stunting', [
            'labels' => $labels,
            'dataTahun1' => $dataTahun1,
            'dataTahun2' => $dataTahun2,
            'tahun1' => $tahun1,
            'tahun2' => $tahun2,
            'availableYears' => $availableYears
        ]);
    }

    public function indexBansos()
    {
        // Mengambil semua jenis bansos DAN
        // menghitung jumlah relasi 'penerimaBansos' untuk setiap jenis.
        // Ini akan menghasilkan properti 'penerima_bansos_count'
        $statistik = JenisBansos::withCount('penerimaBansos')->get();

        // Kirim data statistik ke view
        return view('infografis.bansos', [
            'statistikBansos' => $statistik,
            'hasilPencarian' => null // Awalnya, hasil pencarian kosong
        ]);
    }

    public function searchBansos(Request $request)
    {
        // Validasi request
        $request->validate([
            'nik' => 'required|digits:16' // Asumsi NIK 16 digit
        ]);

        $nik = $request->input('nik');

        // 1. Ambil data statistik lagi (karena halaman di-reload)
        $statistik = JenisBansos::withCount('penerimaBansos')->get();

        // 2. Cari penduduk berdasarkan NIK
        // Kita gunakan 'with' untuk eager loading
        // Ambil data penduduk, lalu semua data 'penerimaBansos' yang terkait,
        // dan juga 'jenisBansos' dari setiap 'penerimaBansos'
        $hasil = PendudukBansos::where('nik', $nik)
            ->with('penerimaBansos.jenisBansos')
            ->first();

        // 3. Kembalikan ke view yang sama dengan membawa hasil
        return view('infografis.bansos', [
            'statistikBansos' => $statistik,
            'hasilPencarian' => $hasil,
            'nikYangDicari' => $nik // Untuk ditampilkan di form jika perlu
        ]);
    }

    public function indexApbdes()
    {
        $tahunTerbaru = Uraian::max('tahun');
        return redirect()->route('infografis.apbdes.show', ['tahun' => $tahunTerbaru]);
    }

    public function showApbdes($tahun)
    {
        // Ambil semua tahun unik
        $tahunList = Uraian::distinct()->orderByDesc('tahun')->pluck('tahun');

        // Ambil semua uraian untuk tahun yang dipilih
        $uraian = Uraian::with(['kategori', 'anggaranTerealisasi'])
            ->where('tahun', $tahun)
            ->get();

        $getTotal = fn($kategori) =>
        $uraian->where('kategori.nama_kategori', $kategori)
            ->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0);

        $surplus_defisit = $getTotal('Pendapatan') - $getTotal('Belanja');

        // Data untuk chart Pertahunnya
        $chartData = Uraian::with(['kategori', 'anggaranTerealisasi'])
            ->get()
            ->groupBy('tahun')
            ->map(function ($items, $tahun) {
                return [
                    'tahun' => $tahun,
                    'pendapatan' => $items->where('kategori.nama_kategori', 'Pendapatan')
                        ->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0),
                    'belanja' => $items->where('kategori.nama_kategori', 'Belanja')
                        ->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0),
                ];
            })
            ->sortBy('tahun')
            ->values();

        $pendapatanChartLabels = $chartData->pluck('tahun');
        $pendapatanChartData = $chartData->pluck('pendapatan');
        $belanjaChartData = $chartData->pluck('belanja');

        // Pendapatan Desa 
        // === Chart 2: Detail Pendapatan Desa per Jenis (tahun terpilih) ===
        $chartPendapatanData = $uraian
            ->where('kategori.nama_kategori', 'Pendapatan')
            ->groupBy('nama_uraian')
            ->map(fn($items) => $items->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0));

        $pendapatanJenisLabels = $chartPendapatanData->keys();
        $pendapatanJenisData = $chartPendapatanData->values();

        // Dropdown Pendapatan Desa 
        $pendapatanDikelompokkan = $uraian
            ->where('kategori.nama_kategori', 'Pendapatan')
            ->filter(fn($u) => optional($u->anggaranTerealisasi)->anggaran > 0);

        // Belanja Desa 
        // === Chart 3: Detail Belanja Desa per Jenis (tahun terpilih) ===
        $chartBelanjaData = $uraian
            ->where('kategori.nama_kategori', 'Belanja')
            ->groupBy('nama_uraian')
            ->map(fn($items) => $items->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0));

        $belanjaJenisLabels = $chartBelanjaData->keys();
        $belanjaJenisData = $chartBelanjaData->values();

        // Dropdown Belanja Desa 
        $belanjaDikelompokkan = $uraian
            ->where('kategori.nama_kategori', 'Belanja')
            ->filter(fn($u) => optional($u->anggaranTerealisasi)->anggaran > 0);

        // Pembiayaan Desa 
        // === Chart 4: Detail Pembiayaan Desa per Jenis (tahun terpilih) ===
        $chartPembiayaanData = $uraian
            ->where('kategori.nama_kategori', 'Pembiayaan')
            ->groupBy('nama_uraian')
            ->map(fn($items) => $items->sum(fn($u) => optional($u->anggaranTerealisasi)->anggaran ?? 0));

        $pembiayaanJenisLabels = $chartPembiayaanData->keys();
        $pembiayaanJenisData = $chartPembiayaanData->values();

        // Dropdown Pembiayaan Desa 
        $pembiayaanDikelompokkan = $uraian
            ->where('kategori.nama_kategori', 'Pembiayaan')
            ->filter(fn($u) => optional($u->anggaranTerealisasi)->anggaran > 0);

        return view('infografis.apbdes.show', [
            'uraian' => $uraian,
            'tahun' => $tahun,
            'tahunList' => $tahunList,
            'totalPendapatan' => $getTotal('Pendapatan'),
            'totalBelanja' => $getTotal('Belanja'),
            'totalPembiayaan' => $getTotal('Pembiayaan'),
            'surplus_defisit' => $surplus_defisit,
            // chart data pendapatan dan belanja pertahun
            'pendapatanChartLabels' => $pendapatanChartLabels,
            'pendapatanChartData' => $pendapatanChartData,
            'belanjaChartData' => $belanjaChartData,
            // chart data pendapatan desa
            'pendapatanJenisLabels' => $pendapatanJenisLabels,
            'pendapatanJenisData' => $pendapatanJenisData,
            // dropdown pendapatan desa detail
            'pendapatanDikelompokkan' => $pendapatanDikelompokkan,
            // chart data belanja desa
            'belanjaJenisLabels' => $belanjaJenisLabels,
            'belanjaJenisData' => $belanjaJenisData,
            // dropdown belanja desa detail
            'belanjaDikelompokkan' => $belanjaDikelompokkan,
            // chart data pembiayaan desa
            'pembiayaanJenisLabels' => $pembiayaanJenisLabels,
            'pembiayaanJenisData' => $pembiayaanJenisData,
            // dropdown pembiayaan desa detail
            'pembiayaanDikelompokkan' => $pembiayaanDikelompokkan,

        ]);
    }
}

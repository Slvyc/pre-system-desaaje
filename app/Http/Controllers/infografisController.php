<?php

namespace App\Http\Controllers;

use App\Models\AnggaranTerealisasi;
use App\Models\StatistikDesa;
use App\Models\StatistikDusun;
use App\Models\StatistikKelompokUmur;
use App\Models\StatistikPendidikan;
use App\Models\Uraian;
use App\Models\RincianAnggaran;
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

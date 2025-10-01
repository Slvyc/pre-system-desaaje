<?php

namespace App\Http\Controllers;

use App\Models\StatistikDesa;
use App\Models\StatistikDusun;
use App\Models\StatistikKelompokUmur;
use App\Models\StatistikPendidikan;
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
}

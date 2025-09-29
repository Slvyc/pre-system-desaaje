<?php

namespace App\Http\Controllers;

use App\Models\StatistikDesa;
use App\Models\StatistikDusun;
use App\Models\StatistikKelompokUmur;
use Illuminate\Http\Request;

class infografisController extends Controller
{
    public function indexPenduduk()
    {
        $statistikDesa = StatistikDesa::all()->groupBy('grup');

        // Umum
        $dataUmum = $statistikDesa->get('Umum', collect())->keyBy('kode_statistik');
        // Pendidikan
        $dataPendidikan = $statistikDesa->get('pendidikan', collect())->keyBy('kode_statistik');;

        // Kelompok Umur
        $kelompokUmur = StatistikKelompokUmur::orderBy('id')->get();
        $umurChartLabels = $kelompokUmur->pluck('rentang_umur');
        $umurChartData = $kelompokUmur->pluck('jumlah');

        // Dusun
        $dusun = StatistikDusun::all();
        $dusunChartLabels = $dusun->pluck('nama_dusun');
        $dusunChartData = $dusun->pluck('jumlah_penduduk');

        return view('infografis.penduduk', [
            'dataUmum' => $dataUmum,
            'dataPendidikan' => $dataPendidikan,
            'dataKelompokUmur' => $kelompokUmur,
            'umurChartLabels' => $umurChartLabels,
            'umurChartData' => $umurChartData,
            'dusunChartLabels' => $dusunChartLabels,
            'dusunChartData' => $dusunChartData,
        ]);
    }
}

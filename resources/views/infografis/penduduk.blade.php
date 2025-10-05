@extends('layouts.app')

@section('content')

    <main class="py-16 bg-custom-2 pt-20">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-16">

            {{-- tabbar --}}
            @include('infografis.tabbar-infografis.tabbar')

            {{-- Penduduk jumlah --}}
            <section class="py-10">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-extrabold text-custom mb-3">
                        ADMINISTRASI PENDUDUK
                    </h2>
                    <p class="text-gray-700 text-lg">
                        Statistik lengkap Desa Tahun 2025 termasuk jumlah penduduk, kepala keluarga, usia produktif, dan
                        lansia.
                    </p>
                </div>

                {{-- grid data penduduk--}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 text-white gap-4">

                    @foreach ($dataUmum as $umum)
                        <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                            <h3 class="text-xl font-bold">{{ $umum->nama_statistik }}</h3>
                            <p class="text-4xl font-extrabold">{{ $umum->nilai ?? 0 }}</p>
                        </div>
                    @endforeach

                    {{-- card 2 --}}
                    {{-- <div
                        class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        <h3 class="text-xl font-bold">Laki-Laki</h3>
                        <p class="text-4xl font-extrabold">{{ $dataUmum['jumlah_laki_laki']->nilai ?? 0}}</p>
                    </div> --}}

                    {{-- card 3 --}}
                    {{-- <div
                        class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        <h3 class="text-xl font-bold">Perempuan</h3>
                        <p class="text-4xl font-extrabold">{{ $dataUmum['jumlah_perempuan']->nilai ?? 0 }}</p>
                    </div> --}}

                    {{-- card 4 --}}
                    {{-- <div
                        class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        <h3 class="text-xl font-bold">Kepala Keluarga</h3>
                        <p class="text-4xl font-extrabold">{{ $dataUmum['jumlah_kk']->nilai ?? 0 }}</p>
                    </div> --}}
                </div>
            </section>

            {{-- Kelompok Umur (Chart JS) --}}
            <h2 class="text-4xl font-extrabold text-custom mb-3">
                Berdasarkan Kelompok Umur
            </h2>
            <canvas id="kelompokUmurChart"></canvas>

            <h2 class="text-4xl font-extrabold text-custom mb-3">
                Berdasarkan Dusun
            </h2>

            <div class="max-w-2xl mx-auto">
                <canvas id="dusunChart" class="my-20 w-full h-80"></canvas>
            </div>


            {{-- Berdasarkan (Chart JS) --}}
            <h2 class="text-4xl font-extrabold text-custom mb-3">
                Berdasarkan Pendidikan
            </h2>
            <canvas id="pendidikanChart"></canvas>
        </div>
    </main>

    {{-- Script Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Ambel data dari controller
        const umurLabels = @json($umurChartLabels);
        const umurDataValues = @json($umurChartData);

        // Konfigurasi Chart.js untuk grafik batang biasa
        const umurData = {
            labels: umurLabels,
            datasets: [{
                label: 'Jumlah Penduduk',
                data: umurDataValues,
                backgroundColor: [
                    '#bad6eb',
                    '#081f5c',
                    '#f7f2eb',
                    '#7096d1'
                ]
            }]
        };

        const umurConfig = {
            type: 'bar', // Tipe grafik batang standar
            data: umurData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false // Menyembunyikan label 'Jumlah Penduduk' di atas
                    }
                }
            }
        };

        // Render grafik di canvas
        const kelompokUmurChart = new Chart(
            document.getElementById('kelompokUmurChart'),
            umurConfig
        );


        // Dusun (Pie)
        // Ambel data dari controller
        const dusunLabels = @json($dusunChartLabels);
        const dusunDataValues = @json($dusunChartData);

        // Konfigurasi Chart.js untuk grafik batang biasa
        const dusunData = {
            labels: dusunLabels,
            datasets: [{
                label: 'Berdasarkan Dusun',
                data: dusunDataValues,
                backgroundColor: [
                    '#f7f2eb', // putih
                    '#081f5c', // biru pekat
                    '#7096d1', // biru soft
                    '#dc3545', //
                    '#17a2b8', // 
                    '#6c757d'  // 
                ],
                borderWidth: 1
            }]
        };

        const dusunConfig = {
            type: 'pie', // Tipe grafik batang standar
            data: dusunData,
            options: {
                responsive: true,
                layout: {
                    layout: {
                        padding: {
                            top: 20,
                            bottom: 20,
                            left: 30,
                            right: 10
                        }
                    }

                },
                plugins: {
                    legend: {
                        position: 'left',
                        labels: {
                            padding: 20
                        }
                    }
                }
            }
        };

        // Render grafik di canvas
        const dusunChart = new Chart(
            document.getElementById('dusunChart'),
            dusunConfig
        );


        // Pendidikan
        // Ambel data dari controller
        const pendidikanLabels = @json($pendidikanChartLabels);
        const pendidikanDataValues = @json($pendidikanChartData);

        // Konfigurasi Chart.js untuk grafik batang biasa
        const pendidikanData = {
            labels: pendidikanLabels,
            datasets: [{
                label: 'Jumlah Penduduk',
                data: pendidikanDataValues,
                backgroundColor: [
                    '#7096d1', // biru soft
                ]
            }]
        };

        const pendidikanConfig = {
            type: 'bar', // Tipe grafik batang standar
            data: pendidikanData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false // Menyembunyikan label 'Jumlah Penduduk' di atas
                    }
                }
            }
        };

        // Render grafik di canvas
        const pendidikanChart = new Chart(
            document.getElementById('pendidikanChart'),
            pendidikanConfig
        );
    </script>
@endsection
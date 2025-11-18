@extends('layouts.app')

@section('content')

    <main class="py-16 bg-custom-2 pt-20">
        <div class="max-w-7xl mx-auto px-6 space-y-16">

            {{-- tabbar --}}
            @include('infografis.tabbar-infografis.tabbar')

            {{-- list tahun --}}
            <div class="flex justify-center mb-6">
                <form id="tahunForm">
                    <div class="relative">
                        <select id="tahunSelect"
                            class="appearance-none w-48 md:w-56 px-4 py-2.5 bg-white border-2 border-custom-3 rounded-xl text-custom text-md font-medium backdrop-blur-md shadow-md hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-custom-3 focus:border-transparent transition duration-200 cursor-pointer">
                            @foreach ($tahunList as $t)
                                <option value="{{ $t }}" {{ $t == $tahun ? 'selected' : '' }}>
                                    Tahun {{ $t }}
                                </option>
                            @endforeach
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor"
                            class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 text-custom-3 pointer-events-none">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </form>
            </div>

            <section class="py-10">
                <div class="text-center mb-20">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-custom-3 mb-5">
                        ANGGARAN PENDAPATAN DAN BELANJA DESA (APBDes)
                    </h2>
                    <p class="text-gray-700 text-lg">
                        Statistik APBDes Desa Tahun 2025.
                    </p>
                </div>

                {{-- grid data penduduk--}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 text-white gap-4">
                    <div
                        class="bg-gradient-to-br from-custom/60 via-custom to-custom/70 p-4 sm:p-6 md:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-6 rounded-xl shadow-md transition-colors duration-300">
                        <h3 class="text-lg sm:text-xl md:text-xl font-semibold text-white">Total Pendapatan :</h3>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-right sm:text-left">
                            Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-custom/60 via-custom to-custom/70 p-4 sm:p-6 md:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-6 rounded-xl shadow-md transition-colors duration-300">
                        <h3 class="text-lg sm:text-xl md:text-xl font-semibold text-white">Total Belanja :</h3>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-right sm:text-left">Rp.
                            {{ number_format($totalBelanja, 0, ',', '.') }}
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-custom/60 via-custom to-custom/70 p-4 sm:p-6 md:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-6 rounded-xl shadow-md transition-colors duration-300">
                        {{-- total pembiayaan nanti sendiri --}}
                        <h3 class="text-lg sm:text-xl md:text-xl font-semibold text-white">Total Pembiayaan :</h3>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-right sm:text-left">Rp.
                            {{ number_format($totalPembiayaan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-custom/60 via-custom to-custom/70 p-4 sm:p-6 md:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-6 rounded-xl shadow-md transition-colors duration-300">
                        <h3 class="text-lg sm:text-xl md:text-xl font-semibold text-white">Defisit/Surplus :</h3>
                        @if ($surplus_defisit < 0)
                            <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-right sm:text-left text-red-700">Rp.
                                {{ number_format($surplus_defisit, 0, ',', '.') }}
                            </p>
                        @else
                            <p class="text-3xl font-extrabold">Rp.
                                {{ number_format($surplus_defisit, 0, ',', '.') }}
                            </p>
                        @endif
                    </div>
                </div>
            </section>


            {{-- Pendapatan dan Belanja (Chart JS) --}}
            <h2 class="text-4xl font-extrabold text-custom my-20">
                Pendapatan dan Belanja Desa dari Tahun ke Tahun
            </h2>
            <canvas id="pendapatanChart"></canvas>

            {{-- Pendapatan Desa Chart --}}
            <h2 class="text-4xl font-extrabold text-custom my-20">
                Pendapatan Desa {{ $tahun }}
            </h2>
            <canvas id="pendapatanJenisChart"></canvas>

            {{-- Pendapatan Desa Detail Dropdown --}}
            <section class="space-y-4">
                @foreach ($pendapatanDikelompokkan as $grup)
                    @php
                        $totalAnggaranGrup = optional($grup->anggaranTerealisasi)->anggaran ?? 0;
                        $rincianList = optional($grup->anggaranTerealisasi)->rincianAnggarans ?? collect([]);
                        $persentase = $totalPendapatan > 0 ? ($totalAnggaranGrup / $totalPendapatan) * 100 : 0;
                    @endphp
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div
                            class="accordion-header flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $grup->nama_uraian }}</h3>
                            <div class="flex items-center space-x-4">
                                <span class="text-lg font-bold text-green-600">
                                    Rp{{ number_format($totalAnggaranGrup, 0, ',', '.') }}
                                </span>
                                <svg class="w-6 h-6 text-gray-600 transition-transform duration-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        @if($rincianList->count() > 0)
                            <div class="accordion-content hidden border-t border-gray-200 bg-gray-50">
                                {{-- Progress Bar --}}
                                <div class="px-4 pt-4 pb-2">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-medium text-gray-700">{{ $grup->nama_uraian }}</span>
                                        <span class="text-sm font-bold text-gray-900">{{ number_format($persentase, 2) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-700 h-2.5 rounded-full" style="width: {{ min($persentase, 100) }}%">
                                        </div>
                                    </div>
                                </div>

                                {{-- Detail Rincian --}}
                                <div class="px-4 pb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                        <table class="w-full text-sm">
                                            <thead class="bg-gray-100 border-b border-gray-200">
                                                <tr>
                                                    <th class="text-left py-2 px-3 font-semibold text-gray-700">Uraian</th>
                                                    <th class="text-right py-2 px-3 font-semibold text-gray-700">Anggaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rincianList as $detail)
                                                    <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50">
                                                        <td class="py-2 px-3 text-gray-700">{{ $detail->nama_rincian }}</td>
                                                        <td class="py-2 px-3 text-right font-semibold text-gray-900">
                                                            Rp{{ number_format($detail->anggaran ?? 0, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="accordion-content hidden border-t border-gray-200 p-4 bg-gray-50">
                                <p class="text-gray-500 text-center">Tidak ada rincian anggaran</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </section>

            {{-- Belanja Desa Chart --}}
            <h2 class="text-4xl font-extrabold text-custom my-20">
                Belanja Desa {{ $tahun }}
            </h2>
            <canvas id="belanjaJenisChart"></canvas>

            {{-- Belanja Desa Detail Dropdown --}}
            <section class="space-y-4">
                @foreach ($belanjaDikelompokkan as $grup)
                    @php
                        $totalAnggaranGrup = optional($grup->anggaranTerealisasi)->anggaran ?? 0;
                        $rincianList = optional($grup->anggaranTerealisasi)->rincianAnggarans ?? collect([]);
                        $persentase = $totalPendapatan > 0 ? ($totalAnggaranGrup / $totalPendapatan) * 100 : 0;
                    @endphp
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div
                            class="accordion-header flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $grup->nama_uraian }}</h3>
                            <div class="flex items-center space-x-4">
                                <span class="text-lg font-bold text-green-600">
                                    Rp{{ number_format($totalAnggaranGrup, 0, ',', '.') }}
                                </span>
                                <svg class="w-6 h-6 text-gray-600 transition-transform duration-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        @if($rincianList->count() > 0)
                            <div class="accordion-content hidden border-t border-gray-200 bg-gray-50">
                                {{-- Progress Bar --}}
                                <div class="px-4 pt-4 pb-2">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-medium text-gray-700">{{ $grup->nama_uraian }}</span>
                                        <span class="text-sm font-bold text-gray-900">{{ number_format($persentase, 2) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-700 h-2.5 rounded-full" style="width: {{ min($persentase, 100) }}%">
                                        </div>
                                    </div>
                                </div>

                                {{-- Detail Rincian --}}
                                <div class="px-4 pb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                        <table class="w-full text-sm">
                                            <thead class="bg-gray-100 border-b border-gray-200">
                                                <tr>
                                                    <th class="text-left py-2 px-3 font-semibold text-gray-700">Uraian</th>
                                                    <th class="text-right py-2 px-3 font-semibold text-gray-700">Anggaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rincianList as $detail)
                                                    <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50">
                                                        <td class="py-2 px-3 text-gray-700">{{ $detail->nama_rincian }}</td>
                                                        <td class="py-2 px-3 text-right font-semibold text-gray-900">
                                                            Rp{{ number_format($detail->anggaran ?? 0, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="accordion-content hidden border-t border-gray-200 p-4 bg-gray-50">
                                <p class="text-gray-500 text-center">Tidak ada rincian anggaran</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </section>

            {{-- Pembiayaan Desa Chart --}}
            <h2 class="text-4xl font-extrabold text-custom mb-3">
                Pembiayaan Desa {{ $tahun }}
            </h2>
            <canvas id="pembiayaanJenisChart"></canvas>

            {{-- Pembiayaan Desa Detail Dropdown --}}
            <section class="space-y-4">
                @foreach ($pembiayaanDikelompokkan as $grup)
                    @php
                        $totalAnggaranGrup = optional($grup->anggaranTerealisasi)->anggaran ?? 0;
                        $rincianList = optional($grup->anggaranTerealisasi)->rincianAnggarans ?? collect([]);
                        $persentase = $totalPendapatan > 0 ? ($totalAnggaranGrup / $totalPendapatan) * 100 : 0;
                    @endphp
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div
                            class="accordion-header flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $grup->nama_uraian }}</h3>
                            <div class="flex items-center space-x-4">
                                <span class="text-lg font-bold text-green-600">
                                    Rp{{ number_format($totalAnggaranGrup, 0, ',', '.') }}
                                </span>
                                <svg class="w-6 h-6 text-gray-600 transition-transform duration-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        @if($rincianList->count() > 0)
                            <div class="accordion-content hidden border-t border-gray-200 bg-gray-50">
                                {{-- Progress Bar --}}
                                <div class="px-4 pt-4 pb-2">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-medium text-gray-700">{{ $grup->nama_uraian }}</span>
                                        <span class="text-sm font-bold text-gray-900">{{ number_format($persentase, 2) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-700 h-2.5 rounded-full" style="width: {{ min($persentase, 100) }}%">
                                        </div>
                                    </div>
                                </div>

                                {{-- Detail Rincian --}}
                                <div class="px-4 pb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                        <table class="w-full text-sm">
                                            <thead class="bg-gray-100 border-b border-gray-200">
                                                <tr>
                                                    <th class="text-left py-2 px-3 font-semibold text-gray-700">Uraian</th>
                                                    <th class="text-right py-2 px-3 font-semibold text-gray-700">Anggaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rincianList as $detail)
                                                    <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50">
                                                        <td class="py-2 px-3 text-gray-700">{{ $detail->nama_rincian }}</td>
                                                        <td class="py-2 px-3 text-right font-semibold text-gray-900">
                                                            Rp{{ number_format($detail->anggaran ?? 0, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="accordion-content hidden border-t border-gray-200 p-4 bg-gray-50">
                                <p class="text-gray-500 text-center">Tidak ada rincian anggaran</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </section>

        </div>
    </main>

    {{-- Script Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Pendapatan dan Belanja Desa dari Tahun ke Tahun
        // Ambil data dari controller
        const labels = @json($pendapatanChartLabels);
        const pendapatanData = @json($pendapatanChartData);
        const belanjaData = @json($belanjaChartData);

        // Konfigurasi Chart.js
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Pendapatan',
                    data: pendapatanData,
                    backgroundColor: '#081f5c',
                },
                {
                    label: 'Belanja',
                    data: belanjaData,
                    backgroundColor: '#bad6eb',
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.dataset.label + ': Rp ' + context.formattedValue;
                            }
                        }
                    }
                }
            }
        };

        // Render grafik
        new Chart(document.getElementById('pendapatanChart'), config);


        // Pendapatan Desa 
        const pendapatanJenisLabels = @json($pendapatanJenisLabels);
        const pendapatanJenisData = @json($pendapatanJenisData);

        // Konfigurasi Chart.js
        const dataPendapatan = {
            labels: pendapatanJenisLabels,
            datasets: [
                {
                    label: 'Jumlah (Rp)',
                    data: pendapatanJenisData,
                    backgroundColor: '#081f5c',
                },
            ]
        };

        const configPendapatan = {
            type: 'bar',
            data: dataPendapatan,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.dataset.label + ': Rp ' + context.formattedValue;
                            }
                        }
                    }
                }
            }
        };

        // Render grafik
        new Chart(document.getElementById('pendapatanJenisChart'), configPendapatan);

        // Belanja Desa 
        const belanjaJenisLabels = @json($belanjaJenisLabels);
        const belanjaJenisData = @json($belanjaJenisData);

        // Konfigurasi Chart.js
        const dataBelanja = {
            labels: belanjaJenisLabels,
            datasets: [
                {
                    label: 'Jumlah (Rp)',
                    data: belanjaJenisData,
                    backgroundColor: '#081f5c',
                },
            ]
        };

        const configBelanja = {
            type: 'bar',
            data: dataBelanja,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.dataset.label + ': Rp ' + context.formattedValue;
                            }
                        }
                    }
                }
            }
        };

        // Render grafik
        new Chart(document.getElementById('belanjaJenisChart'), configBelanja);

        // Pembiayaan Desa 
        const pembiayaanJenisLabels = @json($pembiayaanJenisLabels);
        const pembiayaanJenisData = @json($pembiayaanJenisData);

        // Konfigurasi Chart.js
        const dataPembiayaan = {
            labels: pembiayaanJenisLabels,
            datasets: [
                {
                    label: 'Jumlah (Rp)',
                    data: pembiayaanJenisData,
                    backgroundColor: '#081f5c',
                },
            ]
        };

        const configPembiayaan = {
            type: 'bar',
            data: dataPembiayaan,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.dataset.label + ': Rp ' + context.formattedValue;
                            }
                        }
                    }
                }
            }
        };

        // Render grafik
        new Chart(document.getElementById('pembiayaanJenisChart'), configPembiayaan);
    </script>

    {{-- Script Dropdown/Accordion --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function () {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('svg');

                    // Toggle konten
                    content.classList.toggle('hidden');

                    // Toggle ikon
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>

    <script>
        document.getElementById('tahunSelect').addEventListener('change', function () {
            const tahun = this.value;
            window.location.href = `/infografis/apbdes/${tahun}`;
        });
    </script>
@endsection
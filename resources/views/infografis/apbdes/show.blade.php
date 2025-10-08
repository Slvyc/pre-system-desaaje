@extends('layouts.app')

@section('content')

    <main class="py-16 bg-custom-2 pt-20">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-16">

            {{-- tabbar --}}
            @include('infografis.tabbar-infografis.tabbar')

            {{-- list tahun --}}
            <div class="flex justify-center mb-6">
                <form id="tahunForm">
                    <select id="tahunSelect" class="border border-gray-300 rounded-lg p-2 text-lg">
                        @foreach ($tahunList as $t)
                            <option value="{{ $t }}" {{ $t == $tahun ? 'selected' : '' }}>
                                Tahun {{ $t }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <section class="py-10">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-extrabold text-custom mb-3">
                        ANGGARAN PENDAPATAN DAN BELANJA DESA (APBDes)
                    </h2>
                    <p class="text-gray-700 text-lg">
                        Statistik APBDes Desa Tahun 2025.
                    </p>
                </div>

                {{-- grid data penduduk--}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 text-white gap-4">
                    <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        <h3 class="text-3xl font-bold">Total Pendapatan :</h3>
                        <p class="text-3xl font-extrabold">
                            Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        <h3 class="text-3xl font-bold">Total Belanja :</h3>
                        <p class="text-3xl font-extrabold">Rp. {{ number_format($totalBelanja, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        {{-- total pembiayaan nanti sendiri --}}
                        <h3 class="text-3xl font-bold">Total Pembiayaan :</h3>
                        <p class="text-3xl font-extrabold">Rp. {{ number_format($totalPembiayaan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                        <h3 class="text-3xl font-bold">Defisit/Surplus :</h3>
                        @if ($surplus_defisit < 0)
                            <p class="text-3xl font-extrabold text-red-500">Rp.
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
            <h2 class="text-4xl font-extrabold text-custom mb-3">
                Pendapatan dan Belanja Desa dari Tahun ke Tahun
            </h2>
            <canvas id="pendapatanChart"></canvas>

            {{-- Pendapatan Desa Chart --}}
            <h2 class="text-4xl font-extrabold text-custom mb-3">
                Pendapatan Desa {{ $tahun }}
            </h2>
            <canvas id="pendapatanJenisChart"></canvas>

            {{-- Pendapatan Desa Detail Dropdown --}}
            {{-- <section class="space-y-4">
                @foreach ($pendapatanDetail as $detail)
                <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                    <div class="accordion-header flex justify-between items-center p-4 cursor-pointer">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $detail->nama_uraian }}</h3>
                        <div class="flex items-center space-x-4">
                            <span class="text-lg font-bold text-green-600">
                                Rp. {{ number_format($detail->, 0, ',', '.') }}</span>
                            <svg class="w-6 h-6 text-gray-600 transition-transform duration-300 transform rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="accordion-content border-t border-gray-200 p-4 bg-gray-50">
                        <div class="mb-4">
                            <div class="bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
                            </div>
                            <p class="text-right text-sm font-semibold text-green-600 mt-1">100.00%</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Dana Desa</span>
                                <span class="font-semibold text-gray-900">Rp1.110.727.000,00</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Bagi Hasil Pajak dan Retribusi Daerah</span>
                                <span class="font-semibold text-gray-900">Rp33.427.749,00</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Alokasi Dana Desa</span>
                                <span class="font-semibold text-gray-900">Rp397.032.000,00</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </section> --}}

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
        // Ambil data dari controller
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
@extends('layouts.app')

@section('content')
    <main class="py-16 bg-custom-2 pt-20">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-16">
            {{-- tabbar --}}
            @include('infografis.tabbar-infografis.tabbar')

            <section class="py-10">
                <div class="text-start mb-8">
                    <h2 class="text-4xl font-extrabold text-custom-3 mb-3">
                        Data Stunting
                    </h2>
                    <p class="text-gray-700 text-lg">
                        Perbandingan jumlah stunting berdasarkan kategori per tahun.
                    </p>
                </div>

                {{-- Filter Tahun --}}
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <form method="GET" action="{{ route('infografis.stunting') }}" class="flex flex-wrap gap-4 items-end">
                        {{-- Tahun Pertama --}}
                        <div class="flex-1 min-w-[200px] relative">
                            <label for="tahun1" class="block text-sm font-semibold text-gray-800 mb-3">
                                Tahun Pertama
                            </label>
                            <select name="tahun1" id="tahun1"
                                class="appearance-none w-full px-4 py-2 bg-white/10 border-2 border-custom-3 rounded-lg text-gray-900 font-medium shadow-sm hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-custom-3 focus:border-transparent transition duration-200 cursor-pointer">
                                @foreach($availableYears as $year)
                                    <option value="{{ $year }}" {{ $year == $tahun1 ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="w-5 h-5 absolute right-3 top-[70%] -translate-y-1/2 text-custom-3 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        {{-- Tahun Kedua --}}
                        <div class="flex-1 min-w-[200px] relative">
                            <label for="tahun2" class="block text-sm font-semibold text-gray-800 mb-3">
                                Tahun Kedua
                            </label>
                            <select name="tahun2" id="tahun2"
                                class="appearance-none w-full px-4 py-2 bg-white/10 border-2 border-custom-3 rounded-lg text-gray-900 font-medium shadow-sm hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-custom-3 focus:border-transparent transition duration-200 cursor-pointer">
                                @foreach($availableYears as $year)
                                    <option value="{{ $year }}" {{ $year == $tahun2 ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="w-5 h-5 absolute right-3 top-[70%] -translate-y-1/2 text-custom-3 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <button type="submit"
                            class="px-6 py-2 flex items-center gap-2 bg-custom-3 hover:bg-custom text-white font-semibold rounded-full shadow-md transition transform hover:scale-105"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                                    clip-rule="evenodd" />
                            </svg>Bandingkan
                        </button>
                    </form>
                </div>

                {{-- Chart --}}
                <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-lg p-10">
                    <canvas id="stuntingChart" class="w-full h-80 md:h-96"></canvas>
                </div>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('stuntingChart').getContext('2d');

            // Gradient warna untuk tahun pertama
            const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
            gradient1.addColorStop(0, '#7096d1');
            gradient1.addColorStop(1, '#bad6eb');

            // Gradient warna untuk tahun kedua
            const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
            gradient2.addColorStop(0, '#081f5c');
            gradient2.addColorStop(1, '#395886');

            // Data dari controller (dinamis)
            const stuntingLabels = @json($labels);
            const dataTahun1 = @json($dataTahun1);
            const dataTahun2 = @json($dataTahun2);
            const tahun1 = @json($tahun1);
            const tahun2 = @json($tahun2);

            const stuntingData = {
                labels: stuntingLabels,
                datasets: [
                    {
                        label: 'Data Tahun ' + tahun1,
                        data: dataTahun1,
                        backgroundColor: gradient1,
                        borderRadius: 10,
                        barPercentage: 0.9,
                        categoryPercentage: 0.8
                    },
                    {
                        label: 'Data Tahun ' + tahun2,
                        data: dataTahun2,
                        backgroundColor: gradient2,
                        borderRadius: 10,
                        barPercentage: 0.9,
                        categoryPercentage: 0.8
                    }
                ]
            };

            const stuntingConfig = {
                type: 'bar',
                data: stuntingData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 1500,
                        easing: 'easeOutBounce'
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 20,
                                padding: 15,
                                font: {
                                    size: 13,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#1e293b',
                            titleColor: '#f1f5f9',
                            bodyColor: '#f1f5f9',
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function (context) {
                                    return context.dataset.label + ': ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 100,
                                font: {
                                    size: 12
                                },
                                callback: function (value) {
                                    return value.toLocaleString('id-ID');
                                }
                            },
                            grid: {
                                color: '#e2e8f0',
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11
                                },
                                maxRotation: 45,
                                minRotation: 0
                            }
                        }
                    }
                }
            };

            new Chart(ctx, stuntingConfig);
        });
    </script>
@endsection
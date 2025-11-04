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
                        <div class="flex-1 min-w-[200px]">
                            <label for="tahun1" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tahun Pertama
                            </label>
                            <select name="tahun1" id="tahun1"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @foreach($availableYears as $year)
                                    <option value="{{ $year }}" {{ $year == $tahun1 ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex-1 min-w-[200px]">
                            <label for="tahun2" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tahun Kedua
                            </label>
                            <select name="tahun2" id="tahun2"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @foreach($availableYears as $year)
                                    <option value="{{ $year }}" {{ $year == $tahun2 ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition transform hover:scale-105">
                            🔄 Bandingkan
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
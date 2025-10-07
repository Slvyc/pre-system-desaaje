@extends('layouts.app')

@section('content')

<main class="py-16 bg-custom-2 pt-20">
    <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-16">

        {{-- tabbar --}}
        @include('infografis.tabbar-infografis.tabbar')

        <section class="py-10 ">
            <div class="text-start mb-12">
                <h2 class="text-4xl font-extrabold text-custom-3 mb-3">
                    Data Stunting
                </h2>
                <p class="text-gray-700 text-lg">
                    Perbandingan jumlah stunting berdasarkan kategori tahun 2023 dan 2024.
                </p>
            </div>

            <div class="max-w-7xl mx-auto bg-white rounded-2xl p-10">
                <canvas id="stuntingChart" class="w-full h-80 md:h-96"></canvas>
            </div>
        </section>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script defer>
    const ctx = document.getElementById('stuntingChart').getContext('2d');

    // Gradient warna
    const gradient2023 = ctx.createLinearGradient(0, 0, 0, 400);
    gradient2023.addColorStop(0, '#081f5c');
    gradient2023.addColorStop(1, '#7096d1');

    const gradient2024 = ctx.createLinearGradient(0, 0, 0, 400);
    gradient2024.addColorStop(0, '#bad6eb');
    gradient2024.addColorStop(1, '#395886');

    // Data gpt gatau
    const stuntingLabels = ['Keluarga Sasaran', 'Berisiko', 'Baduta', 'Balita', 'Pasangan Usia Subur (PUS)', 'PUS Hamil'];
    const stuntingData2023 = [890, 7, 97, 355, 650, 71];
    const stuntingData2024 = [987, 15, 138, 327, 737, 70];

    const stuntingData = {
        labels: stuntingLabels,
        datasets: [
            {
                label: 'Data Tahun 2023',
                data: stuntingData2023,
                backgroundColor: gradient2023,
                borderRadius: 10,
                barPercentage: 0.9
            },
            {
                label: 'Data Tahun 2024',
                data: stuntingData2024,
                backgroundColor: gradient2024,
                borderRadius: 10,
                barPercentage: 0.9
            }
        ]
    };

    const stuntingConfig = {
        type: 'bar',
        data: stuntingData,
        options: {
            responsive: true,
            animation: {
                duration: 1500,
                easing: 'easeOutBounce'
            },
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 20,
                        padding: 15
                    }
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: '#1e293b',
                    titleColor: '#f1f5f9',
                    bodyColor: '#f1f5f9'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 100 },
                    grid: { color: '#e2e8f0' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    };

    new Chart(ctx, stuntingConfig);
</script>

@endsection

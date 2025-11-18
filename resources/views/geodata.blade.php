@extends('layouts.app')

@section('content')

    <section class="py-16 bg-custom-2 pt-35">
        <div class="max-w-7xl mx-auto px-6 space-y-8">
            <div class="text-start">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-custom">PETA DESA</h2>
                <p class="mt-2 text-gray-700 text-base sm:text-lg">
                    Berikut lokasi Desa Aje beserta sekitarnya untuk memudahkan masyarakat dan pengunjung.
                </p>
            </div>

            {{-- peta digitasi --}}
            <div id="map" class="w-full h-80 bg-custom-2 sm:h-96 md:h-[500px] rounded-3xl z-40 overflow-hidden"></div>

            {{-- Leaflet CSS --}}
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

            {{-- Leaflet JS --}}
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <script>
                // Koordinat Desa Aje (sementara, bisa diganti kalau kamu punya yang akurat)
                const desaLat = 5.513;
                const desaLng = 95.347;

                // Inisialisasi peta
                const map = L.map('map').setView([desaLat, desaLng], 14);

                // Tile layer (OpenStreetMap)
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                // Marker lokasi desa
                L.marker([desaLat, desaLng])
                    .addTo(map)
                    .bindPopup('Lokasi Desa Aje')
                    .openPopup();
            </script>
            <a href="#"
                class="mt-6 lg:mt-0 bg-custom self-start text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-300">
                Download Metadata
            </a>
        </div>
    </section>
@endsection
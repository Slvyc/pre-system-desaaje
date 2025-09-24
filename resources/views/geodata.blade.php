@extends('layouts.app')

@section('content')

    <section class="py-16 bg-custom-2 pt-35">
        <div class="max-w-7xl mx-auto px-4 md:px-0 space-y-8">
            <div class="text-start">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-custom">PETA DESA</h2>
                <p class="mt-2 text-gray-700 text-base sm:text-lg">
                    Berikut lokasi Desa Aje beserta sekitarnya untuk memudahkan masyarakat dan pengunjung.
                </p>
            </div>

            {{-- peta digitasi --}}
            <div class="w-full h-80 bg-black sm:h-96 md:h-[500px] rounded-3xl overflow-hidden">
                <iframe src="" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <a href="#"
                class="mt-6 lg:mt-0 bg-custom self-start text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-300">
                Download Metadata
            </a>
        </div>
    </section>
@endsection
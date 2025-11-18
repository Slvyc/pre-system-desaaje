@extends('layouts.app')

@section('content')

    <section class="py-16 bg-custom-2 pt-35">
        <div class="max-w-7xl mx-auto px-6 text-start">
            <h2 class="text-4xl font-extrabold text-custom mb-2">SOTK</h2>
            <p class="text-lg text-gray-800 mb-8">
                Struktur Organisasi dan Tata Kerja Desa Aje
            </p>

            <figure class="bg-white rounded-3xl shadow-lg p-4">
                <img src="#" alt="Struktur Organisasi dan Tata Kerja Pemerintah Desa Aje" width="1200" height="800"
                    loading="lazy" decoding="async" class="mx-auto w-full max-w-4xl h-auto object-contain">
                <figcaption class="text-sm text-gray-600 mt-2">
                    Struktur Organisasi Pemerintah Desa Aje
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="py-16 bg-custom-2">
        <div class="max-w-7xl mx-auto px-6 mb-20">
            <h2 class="text-3xl md:text-4xl font-extrabold text-custom py-12">PEJABAT PEMERINTAH DESA</h2>

            {{-- Grid Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pb-12">

                {{-- Card Template --}}
                @foreach ($aparats as $aparat)
                    <article
                        class="relative rounded-4xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">

                        <figure class="h-72 md:h-115 w-full">
                            <img src="{{ asset('storage/' . $aparat->foto_aparat) }}" alt="{{ $aparat->nama_aparat }}"
                                class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                        </figure>

                        <figcaption
                            class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-white rounded-full px-2 py-2 text-center shadow-md w-[97%] sm:w-[95%]">
                            <h3 class="text-base md:text-lg font-bold text-gray-800">
                                {{ $aparat->nama_aparat }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $aparat->jabatan_aparat }}
                            </p>
                        </figcaption>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
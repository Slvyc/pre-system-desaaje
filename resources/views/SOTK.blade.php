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

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 mb-20">
            <h2 class="text-3xl md:text-4xl font-extrabold text-custom py-12">PEJABAT PEMERINTAH DESA</h2>

            {{-- Grid Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 pb-12">

                {{-- Card Template --}}
                @foreach ($aparats as $aparat)
                    <article class="relative mb-12">
                        <figure class="rounded-3xl overflow-hidden shadow h-80 md:h-96">
                            <img src="{{ asset('storage/' . $aparat->foto_aparat) }}"
                                alt="Budi Santoso - Kepala Administrasi Desa" loading="lazy" class="w-full h-full object-cover">
                        </figure>

                        <figcaption
                            class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-11/12 sm:w-10/12 bg-custom px-4 py-4 text-center z-10 shadow">
                            <h3 class="text-base sm:text-lg font-bold text-white">
                                {{ $aparat->nama_aparat }}
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-300">
                                {{ $aparat->jabatan_aparat }}
                            </p>
                        </figcaption>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
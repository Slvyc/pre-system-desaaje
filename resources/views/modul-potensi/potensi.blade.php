@extends('layouts.app')

@section('content')

    <section class="py-20 bg-custom-2 pt-30">
        <div class="max-w-7xl mx-auto px-6 md:px-0">
            <header class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start py-5 border-b-5 border-custom mb-13">
                <h2 class="text-4xl font-extrabold text-custom lg:col-span-1">
                    POTENSI DESA
                </h2>

                <p class="text-gray-850 max-w-4xl lg:col-span-2">
                    Desa kami memiliki berbagai potensi unggulan dalam bidang
                    <strong>pertanian</strong> dan <strong>UMKM lokal</strong>
                    yang mendukung kesejahteraan masyarakat serta mendorong
                    pertumbuhan ekonomi berkelanjutan.
                </p>
            </header>

            {{-- grid POTENSI --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- card 1 --}}
                @foreach ($potensis as $potensi)
                    <article
                        class="relative bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $potensi->gambar_potensi) }}" alt="{{ $potensi->slug }}"
                                loading="lazy" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-custom/70 flex items-end p-4">
                                <h3 class="text-white text-lg font-extrabold line-clamp-2">
                                    {{ $potensi->nama_potensi }}
                                </h3>
                            </div>
                        </div>

                        <div class="p-6">
                            <p class="text-gray-700 text-sm mb-4 line-clamp-2 leading-snug">
                                {{ $potensi->bagian_potensi }}
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('potensi.show', $potensi->slug) }}"
                                    class="inline-flex text-sm font-semibold text-custom transition">
                                    Lihat selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="w-4 h-4 ml-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
                <div class="mt-6 text-center">
                    {{ $potensis->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
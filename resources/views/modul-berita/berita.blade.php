@extends('layouts.app')

@section('content')
    <section class="py-20 bg-custom-2 pt-30">
        <div class="max-w-7xl mx-auto px-6 md:px-0">
            <div class="text-start py-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-custom">
                    BERITA TERBARU DESA
                </h2>
                <p class="text-gray-700 mt-2">
                    Informasi dan kegiatan terbaru dari desa untuk masyarakat.
                </p>
            </div>

            {{-- grid berita --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- card 1 --}}
                @foreach ($beritas as $berita)
                    <a href="{{ route('berita.show', $berita->slug_berita) }}" class="no-underline">
                        <article
                            class="relative bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->slug_berita }}"
                                loading="lazy" class="w-full h-56 object-cover">
                            <div class="absolute top-4 left-4 bg-custom text-white text-xs font-bold px-3 py-1 rounded-full">
                                {{ \Carbon\Carbon::parse($berita->tanggal_berita)->locale('id')->translatedFormat('l, d F Y') }}
                            </div>

                            {{-- konten --}}
                            <div class="p-6">
                                <h3 class="text-lg font-extrabold text-custom mb-2 line-clamp-2">
                                    {{ $berita->judul_berita }}
                                </h3>
                                <p class="text-gray-700 text-sm mb-4 line-clamp-2">
                                    {{ $berita->bagian_berita }}
                                </p>

                                <footer class="flex items-center justify-between mt-7 text-xs font-semibold text-black">

                                    {{-- administrastor --}}
                                    <div class="flex items-center space-x-1" aria-label="Penulis Berita">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 text-black/50">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Administrator</span>
                                    </div>

                                    {{-- view --}}
                                    <div class="flex items-center space-x-1" aria-label="Jumlah Dilihat">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 text-black/50">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $berita->views }}</span>
                                    </div>
                                </footer>
                            </div>
                        </article>
                    </a>
                @endforeach
                <div class="mt-6 text-center">
                    {{ $beritas->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
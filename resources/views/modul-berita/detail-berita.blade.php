@extends('layouts.app')

@section('content')

    <section class="py-16 bg-inherit md:bg-custom-2 pt-30">
        <div class="max-w-7xl mx-auto px-6 py-8 text-start md:px-0">
            <h2 class="text-3xl md:text-4xl uppercase font-extrabold text-custom mb-3">
                Berita Desa Aje
            </h2>

            <nav aria-label="Breadcrumb">
                <ol class="flex items-center text-sm md:text-base text-gray-600 gap-1 sm:gap-2">
                    <li>
                        <a href="{{ route('berita') }}" class="hover:text-custom font-medium">Berita</a>
                        <span class="px-1 text-gray-400" aria-hidden="true">/</span>
                    </li>
                    <li aria-current="page" class="text-gray-800 font-semibold">
                        {{ $berita->slug_berita }}
                    </li>
                </ol>
            </nav>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-4">

            {{-- artikel utama --}}

            <article class="lg:col-span-3 bg-white rounded-0 md:rounded-3xl p-6">
                <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->slug_berita }}" loading="lazy"
                    class="w-full h-64 md:h-120 object-cover rounded-xl mb-6">

                <h1 class="text-2xl md:text-4xl font-bold leading-snug text-gray-900 mb-4">{{ $berita->judul_berita }}
                </h1>

                <div class="flex flex-col sm:flex-row sm:items-center text-gray-500 text-sm gap-3 sm:gap-4 mb-5">
                    <div class="flex flex-wrap items-center gap-3 sm:gap-4">

                        {{-- tanggal --}}

                        <time datetime="2025-09-21"
                            class="inline-flex items-center gap-1 text-sm text-white bg-custom px-3 py-1 rounded-3xl"
                            aria-label="Tanggal berita">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 text-white" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6.75 3a.75.75 0 0 1 .75.75V5h9V3.75a.75.75 0 0 1 1.5 0V5h.75A2.25 2.25 0 0 1 21 7.25v11.5A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75V7.25A2.25 2.25 0 0 1 5.25 5H6V3.75A.75.75 0 0 1 6.75 3ZM4.5 8v10.75c0 .414.336.75.75.75h13.5a.75.75 0 0 0 .75-.75V8H4.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ \Carbon\Carbon::parse($berita->tanggal_berita)->locale('id')->translatedFormat('l, d F Y') }}
                        </time>

                        <span class="inline-flex items-center gap-1 text-sm text-gray-600" aria-label="administrator">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 text-gray-500" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Administrator</span>
                        </span>
                    </div>

                    <span class="sm:ml-auto inline-flex items-center gap-1 text-sm text-gray-600"
                        aria-label="Dilihat 4 kali">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 text-gray-500" aria-hidden="true">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Dilihat {{ $berita->views }} kali</span>
                    </span>
                </div>

                {{-- isi --}}

                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! nl2br(e($berita->bagian_berita)) !!}
                </p>

                @if ($berita->gambar_berita_2)
                    <img src="{{ asset('storage/' . $berita->gambar_berita_2 ?? '') }}"
                        alt="{{ $berita->gambar_berita_2 ?? '' }}" loading="lazy"
                        class="w-full h-64 md:h-120 object-cover rounded-xl mb-6">
                @endif

                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! nl2br(e($berita->bagian_berita_2 ?? '')) !!}
                </p>

            </article>

            {{-- sidebar --}}
            <aside aria-labelledby="latest-news" class="bg-white rounded-3xl shadow p-6 h-fit sticky top-30 self-start">
                <h2 id="latest-news" class="text-xl font-bold text-gray-900 mb-6 border-b pb-3">
                    Berita Terbaru
                </h2>

                <ul class="space-y-6">
                    @foreach ($previews as $preview)
                        <li>
                            <article class="flex items-start gap-4 group">

                                {{-- thumbnail --}}
                                <div class="w-20 h-16 flex-shrink-0 overflow-hidden rounded-lg">
                                    <img src="{{ asset('storage/' . $preview->gambar_berita) }}" alt="{{ $preview->slug_berita }}"
                                        loading="lazy" width="80" height="64"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                </div>

                                {{-- info --}}
                                <div class="flex-1">
                                    <h3
                                        class="text-sm sm:text-base font-semibold text-gray-800 group-hover:text-custom line-clamp-2">
                                        <a href="{{ route('berita.show', $preview->slug_berita) }}" class="focus:outline-none focus:ring-2 focus:ring-custom">
                                            {{ $preview->judul_berita }}
                                        </a>
                                    </h3>

                                    <div class="flex items-center gap-4 text-xs text-gray-500 mt-2">
                                        {{-- tanggal --}}
                                        <time datetime="2025-09-08" class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-4 h-4 text-gray-500">
                                                <path fill-rule="evenodd"
                                                    d="M6.75 3a.75.75 0 0 1 .75.75V5h9V3.75a.75.75 0 0 1 1.5 0V5h.75A2.25 
                                                                                                                        2.25 0 0 1 21 7.25v11.5A2.25 2.25 0 0 1 18.75 21H5.25A2.25 
                                                                                                                        2.25 0 0 1 3 18.75V7.25A2.25 
                                                                                                                        2.25 0 0 1 5.25 5H6V3.75A.75.75 
                                                                                                                        0 0 1 6.75 3ZM4.5 8v10.75c0 
                                                                                                                        .414.336.75.75.75h13.5a.75.75 
                                                                                                                        0 0 0 .75-.75V8H4.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{  $preview->tanggal_berita }}
                                        </time>

                                        {{-- view --}}
                                        <span class="flex items-center gap-1" aria-label="Dilihat 70 kali">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-4 h-4 text-gray-500">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 
                                                                                                                        6.976 7.028 3.75 12.001 
                                                                                                                        3.75c4.97 0 9.185 3.223 
                                                                                                                        10.675 7.69.12.362.12.752 
                                                                                                                        0 1.113-1.487 4.471-5.705 
                                                                                                                        7.697-10.677 7.697-4.97 
                                                                                                                        0-9.186-3.223-10.675-7.69a1.762 
                                                                                                                        1.762 0 0 1 0-1.113ZM17.25 
                                                                                                                        12a5.25 5.25 0 1 1-10.5 0 
                                                                                                                        5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>{{ $preview->views }}
                                            </span>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </section>

@endsection
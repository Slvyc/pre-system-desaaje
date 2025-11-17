@extends('layouts.app')

@section('content')

    <section class="max-w-7xl mx-auto p-6 pt-32 mb-10">

        {{-- breadcrumb --}}
        <nav aria-label="Breadcrumb" class="text-sm md:text-base mb-4 text-gray-600">
            <ol class="list-reset flex">
                <li>
                    <a href="{{ route('produk') }}" class="hover:text-custom font-medium">Produk</a>
                    <span class="px-1 text-gray-400" aria-hidden="true">/</span>
                </li>
                <li aria-current="page" class="text-gray-800 font-semibold">
                    Detail Produk
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            {{-- product --}}
            <article class="space-y-4">
                <div class="bg-gray-100 rounded-xl p-4">
                    <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}"
                        class="w-full h-100 rounded-xl object-cover" loading="lazy">
                </div>
            </article>

            {{-- info --}}
            <article class="space-y-6">
                <div class="flex items-center space-x-2 text-custom">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <span>Produk Desa Aje</span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900">{{ $produk->nama_produk }}</h1>
                <p class="mt-2 text-gray-700 text-base">
                    {{ $produk->deskripsi }}
                </p>


                {{-- rating --}}
                <div class="flex items-center space-x-2">
                    <div class="flex items-center mb-2" id="rating-1">
                        <button class="star text-gray-300" data-value="1"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="star text-gray-300" data-value="2"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="star text-gray-300" data-value="3"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="star text-gray-300" data-value="4"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="star text-gray-300" data-value="5"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <span class="ml-3 text-gray-500 text-sm rating-value">0</span>
                    </div>
                </div>

                {{-- harga --}}
                <p class="text-2xl font-bold text-gray-900">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }} / {{ $produk->satuan }}
                </p>

                <div class="flex space-x-2">

                    {{-- hubungi penjual --}}
                    <a href="https://wa.me/{{ $produk->no_hp_penjual }}?text=Halo, saya tertarik dengan produk {{ urlencode($produk->nama_produk) }}"
                        target="_blank" class="flex-1"><button
                            class="flex-1 bg-custom w-full text-white p-3 rounded-lg hover:bg-custom/95 transition"
                            aria-label="Hubungi penjual produk Tahu via WhatsApp atau telepon">
                            Hubungi Penjual
                        </button>
                    </a>

                    {{-- love --}}
                    <button id="love-btn"
                        class="bg-gray-200 text-red-700 p-3 rounded-lg hover:bg-gray-300 transition flex items-center justify-center"
                        aria-label="Add to wishlist">
                        <svg id="love-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>
            </article>
        </div>
    </section>
@endsection
@extends('layouts.app')

@section('content')

    <section class="py-16 bg-white pt-35">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            <div>
                <h2 class="text-4xl font-extrabold text-custom mb-2">
                    PRODUK DESA
                </h2>
                <p class="text-gray-600 max-w-7xl">
                    Dukung perekonomian lokal dengan membeli produk unggulan hasil karya masyarakat desa.
                </p>
            </div>

            {{-- produk grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- produk --}}
                @foreach ($produks as $produk)
                    <article>
                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}"
                            loading="lazy" class="w-full h-80 object-cover bg-custom-2 rounded-2xl">

                        <div class="p-4">
                            <div class="flex items-center justify-between">

                                {{-- Konten Kiri --}}
                                <div class="flex-1">
                                    <h3 class="text-xl font-extrabold uppercase text-custom mb-2">{{ $produk->nama_produk }}
                                    </h3>

                                    {{-- ratingnya KALO JS NYA KUTARO DI APP.JS // JS UNTUK RATING --}}
                                    <div class="flex items-center mb-2" id="rating-1">
                                        <button class="star text-gray-300" data-value="1"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="star text-gray-300" data-value="2"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="star text-gray-300" data-value="3"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="star text-gray-300" data-value="4"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="star text-gray-300" data-value="5"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <span class="ml-2 text-sm text-gray-500 rating-value">0</span>
                                    </div>
                                    <p class="text-lg font-semibold text-black">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }} / {{ $produk->satuan }}
                                    </p>
                                </div>
                                {{-- Icon Selengkapnya (Kanan Tengah) --}}
                                <div class="ml-4 flex items-center">
                                    <a href="{{ route('produk.show', $produk->id) }}"
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-custom text-white hover:bg-custom/80 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                    </article>
                @endforeach
                <div class="mt-6 text-center">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
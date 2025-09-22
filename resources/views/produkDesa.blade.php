@extends('layouts.app')

@section('content')

    <section class="py-16 bg-white pt-35">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-12">
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
                @foreach (range(1, 5) as $i)
                <a href="{{ route('detailProduk') }}" class="no-underline">
                    <article class="mb-5">
                        <img src="images/tegel.jpeg" alt="Tegel" loading="lazy"
                            class="w-full h-80 object-cover bg-custom-2 rounded-2xl">
                        <div class="py-6">
                            <h3 class="text-xl font-extrabold uppercase text-custom mb-2">Tegel</h3>

                            {{-- ratingnya KALO JS NYA KUTARO DI APP.JS // JS UNTUK RATING --}}
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
                                <span class="ml-2 text-sm text-gray-500 rating-value">0</span>
                            </div>

                            <p class="text-lg font-semibold text-black">Rp 90.000 / m²</p>
                        </div>
                    </article>
                </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection
@extends('layouts.app')

@section('content')
    <main class="py-16 bg-custom-2 pt-20">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-16">

            {{-- VISI MISI --}}
            <section aria-labelledby="visi-misi-heading" class="py-16">
                <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 items-center text-lg">

                    <header class="md:col-span-1">
                        <h2 id="visi-misi-heading"
                            class="text-3xl md:text-4xl font-extrabold uppercase justify-center text-custom mb-6">
                            VISI DAN MISI DESA
                        </h2>
                        <p class="text-gray-600">
                            Arah pembangunan desa yang berkelanjutan dan sejahtera, berlandaskan budaya lokal.
                        </p>
                    </header>

                    <div class="md:col-span-2 grid gap-6">
                        {{-- VISI --}}
                        <article class="bg-white p-6 md:p-10 rounded-2xl shadow text-center">
                            <h3 class="text-3xl font-bold text-custom mb-6">Visi</h3>
                            <p class="text-black leading-relaxed">
                                {{-- pake !! karna component rich editor filament --}}
                                {!! $visimisi->visi !!}
                            </p>
                        </article>

                        {{-- MISI --}}
                        <article class="bg-white p-6 md:p-10 rounded-2xl shadow">
                            <h3 class="text-3xl font-bold text-custom text-center mb-6">Misi</h3>
                            <div
                                class="[&>ul]:list-disc [&>ul]:list-inside [&>ul]:text-black [&>ul]:space-y-2 prose max-w-none">
                                {!! $visimisi->misi !!}
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            {{-- BAGAN --}}
            <section id="bagan-desa" aria-labelledby="bagan-desa-heading">
                <h2 id="bagan-desa-heading"
                    class="text-4xl sm:text-4xl text-center mb-12 uppercase font-extrabold text-custom">
                    BAGAN DESA
                </h2>

                {{-- GRID --}}
                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <h3
                            class="text-xl font-semibold text-center text-custom border-2 rounded-2xl p-4 border-custom mb-5">
                            Struktur Organisasi Desa
                        </h3>
                        <figure class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                            <img src="{{ asset('storage/' . $baganDesa->struktur_organisasi_pemerintahan_desa) }}"
                                alt="Bagan struktur organisasi Desa Aje" class="w-full h-80 object-cover" loading="lazy">
                        </figure>
                    </div>

                    <div>
                        <h3
                            class="text-xl font-semibold text-center text-custom border-2 rounded-2xl p-4 border-custom mb-5">
                            Perangkat Desa Aje
                        </h3>
                        <figure class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                            <img src="{{ asset('storage/' . $baganDesa->struktur_organisasi_badan_permusyawaratan_desa) }}"
                                class="w-full h-80 object-contain" loading="lazy">
                        </figure>
                    </div>
                </div>
            </section>

            {{-- SEJARAH --}}
            <section id="sejarah" aria-labelledby="sejarah-heading" class="space-y-6">
                <header>
                    <h2 id="sejarah-heading" class="text-4xl mb-12 uppercase font-extrabold text-custom">
                        Sejarah Desa
                    </h2>
                </header>
                <article class="bg-white p-10 rounded-2xl shadow leading-relaxed text-gray-700">
                    {!! $sejarah->bagian_sejarah !!}
                </article>
            </section>

            {{-- LOKASI DESA --}}
            <section class="pb-16 bg-custom-2" aria-labelledby="peta-desa-heading">
                <h2 id="peta-desa-heading"
                    class="text-3xl sm:text-4xl text-start mb-12 uppercase font-extrabold text-custom">
                    LOKASI DESA
                </h2>

                {{-- grid --}}
                <div class="grid md:grid-cols-2 gap-4 items-start">
                    <div class="grid gap-4">

                        {{-- batas --}}
                        <article class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                            <h3 class="text-xl font-bold text-black mb-4">Batas Desa</h3>
                            <ul class="grid grid-cols-2 gap-x-6 gap-y-2 text-black">
                                <li><span class="font-semibold">Utara:</span> </li>
                                <li><span class="font-semibold">Timur:</span> </li>
                                <li><span class="font-semibold">Selatan:</span> </li>
                                <li><span class="font-semibold">Barat:</span> </li>
                            </ul>
                        </article>


                        {{-- luas --}}
                        <article class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                            <h3 class="text-xl font-bold text-black mb-2">Luas Desa</h3>
                            <p class="text-black">± 1.250 Ha</p>
                        </article>

                        {{-- jumlah --}}
                        <article class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                            <h3 class="text-xl font-bold text-black mb-2">Jumlah Penduduk</h3>
                            <p class="text-black">3.542 Jiwa (2025)</p>
                        </article>
                    </div>

                    {{-- peta --}}
                    <div class="w-full h-80 sm:h-96 md:h-[500px] rounded-2xl overflow-hidden shadow-lg">
                        <iframe src="...." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
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
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum optio animi minima tenetur
                                repellendus dicta expedita earum quiaMenjadi desa yang mandiri, maju, dan sejahtera dengan
                                mengedepankan gotong royong,
                                pelestarian budaya, serta pembangunan berkelanjutan., nostrum cumque quidem, velit odio,
                                doloremque illum numquam corrupti nisi accusamus corporis?
                            </p>
                        </article>

                        {{-- MISI --}}
                        <article class="bg-white p-6 md:p-10 rounded-2xl shadow">
                            <h3 class="text-3xl font-bold text-custom text-center mb-6">Misi</h3>
                            <ul class="list-disc list-inside text-black space-y-2">
                                <li>Meningkatkan kualitas pendidikan dan kesehatan masyarakat.</li>
                                <li>Mendorong perekonomian berbasis potensi lokal.</li>
                                <li>Melestarikan budaya dan tradisi desa.</li>
                                <li>Mewujudkan tata kelola pemerintahan desa yang transparan dan akuntabel.</li>
                            </ul>
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

                    {{-- GGRID --}}
                    <div class="grid md:grid-cols-2 gap-4">

                        <div>
                            <h3
                                class="text-xl font-semibold text-center text-custom border-2 rounded-2xl p-4 border-custom mb-5">
                                Struktur Organisasi Desa
                            </h3>
                            <figure class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                                <img src="images/71d83261-1c05-4fe1-9403-04d7539bfa9d.jpeg"
                                    alt="Bagan struktur organisasi Desa Aje" class="w-full h-80 object-cover"
                                    loading="lazy">
                            </figure>
                        </div>

                        <div>
                            <h3
                                class="text-xl font-semibold text-center text-custom border-2 rounded-2xl p-4 border-custom mb-5">
                                Perangkat Desa Aje
                            </h3>
                            <figure class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                                <img src="/images/bagan-desa-2.jpg" alt="Bagan perangkat Desa Aje"
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
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste delectus nam alias, expedita ex et
                        unde tempore recusandae fugit nisi omnis, dicta vero debitis nulla accusamus praesentium dolores
                        mollitia cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aperiam facilis enim
                        dolores, delectus rerum sit. Aut molestias cupiditate repellat iste. Laudantium obcaecati iste
                        laborum id quibusdam sapiente qui quae?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste delectus nam alias, expedita ex et
                        unde tempore recusandae fugit nisi omnis, dicta vero debitis nulla accusamus praesentium dolores
                        mollitia cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aperiam facilis enim
                        dolores, delectus rerum sit. Aut molestias cupiditate repellat iste. Laudantium obcaecati iste
                        laborum id quibusdam sapiente qui quae?
                    </p>
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
                            <iframe src="...." width="100%" height="100%"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
            </section>
        </div>
    </main>
@endsection
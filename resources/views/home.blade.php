@extends('layouts.app')

@section('content')
    {{-- HERO SECTION --}}
    <section class="fixed top-0 left-0 w-full h-screen overflow-hidden -z-10">
        {{-- slide wrapper --}}
        <div id="carousel" class="relative h-full">
            {{-- slide 1 --}}
            <div class="absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
                <img src="https://picsum.photos/id/1018/1600/900" alt="Slide 1" loading="lazy"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center px-4">
                    <h1 class="text-3xl md:text-6xl font-bold text-white mb-4 leading-snug">
                        Selamat Datang<br>
                        <span class="block">Website Resmi Desa Aje</span>
                    </h1>
                    <p class="text-white text-sm md:text-xl max-w-xl">Sumber Informasi Pemerintahan Desa</p>
                </div>
            </div>

            {{-- slide 2 --}}
            <div class="absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="https://picsum.photos/id/1015/1600/900" alt="Slide 2" loading="lazy"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <h1 class="text-4xl md:text-7xl font-bold text-white mb-4 leading-snug">
                        layanan Desa</h1>
                </div>
            </div>

            {{-- slide 3 --}}
            <div class="absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="https://picsum.photos/id/1019/1600/900" alt="Slide 3" loading="lazy"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <h1 class="text-4xl md:text-7xl font-bold text-white mb-4 leading-snug">
                        layanan Desa</h1>
                </div>
            </div>
        </div>

        {{-- Prev Button --}}
        <button id="prevBtn"
            class="absolute top-1/2 left-8 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-3">
            &#10094;
        </button>

        {{-- Next Button --}}
        <button id="nextBtn"
            class="absolute top-1/2 right-8 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-3">
            &#10095;
        </button>
        </div>

        {{-- Indicators --}}
        <div class="absolute bottom-40 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <span class="w-3 h-3 bg-white rounded-full opacity-80"></span>
            <span class="w-3 h-3 bg-white rounded-full opacity-50"></span>
            <span class="w-3 h-3 bg-white rounded-full opacity-50"></span>
        </div>
    </section>

    {{-- SHORTCUT --}}

    <section class="mt-165 relative bg-custom py-20 rounded-t-4xl">
        <div class="max-w-7xl mx-auto px-6 md:px-0 justify-center items-center">
            {{-- Gric Card nya --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 -mt-23 -translate-y-16">

                {{-- card 1 --}}
                <div class="bg-white rounded-3xl shadow-lg p-6 flex flex-col items-center text-center space-y-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-home-edit text-custom">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2c.645 0 1.218 .305 1.584 .78" />
                        <path d="M20 11l-8 -8l-9 9h2v7a2 2 0 0 0 2 2h4" />
                        <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                    </svg>
                    <p class="text-base font-semibold text-gray-800">Profil Desa</p>
                </div>

                {{-- card 2--}}
                <div class="bg-white rounded-3xl shadow-lg p-6 flex flex-col items-center text-center space-y-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-chart-infographic text-custom">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M7 3v4h4" />
                        <path d="M9 17l0 4" />
                        <path d="M17 14l0 7" />
                        <path d="M13 13l0 8" />
                        <path d="M21 12l0 9" />
                    </svg>
                    <p class="text-base font-semibold text-gray-800">Infografis</p>
                </div>

                {{-- card 3 --}}
                <div class="bg-white rounded-3xl shadow-lg p-6 flex flex-col items-center text-center space-y-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-map-2 text-custom">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" />
                        <path d="M9 4v13" />
                        <path d="M15 7v5.5" />
                        <path
                            d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                        <path d="M19 18v.01" />
                    </svg>
                    <p class="text-base font-semibold text-gray-800">Geodata</p>
                </div>

                {{-- card 4 --}}
                <div class="bg-white rounded-3xl shadow-lg p-6 flex flex-col items-center text-center space-y-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-library text-custom">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                        <path
                            d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                        <path d="M11 7h5" />
                        <path d="M11 10h6" />
                        <path d="M11 13h3" />
                    </svg>
                    <p class="text-base font-semibold text-gray-800">PPID</p>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center text-white max-w-2xl mx-auto space-y-4">
            <h3 class="text-2xl md:text-4xl font-bold">JELAJAHI DESA</h3>
            <p class="text-sm md:text-lg">Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa.
                Aspek pemerintahan, penduduk, demografi, potensi Desa, dan juga berita tentang Desa.</p>
        </div>
    </section>

    {{-- END SHORTCUT --}}


    {{-- SAMBUTAN KADES --}}

    <section class="pb-20 bg-custom-2">
        <div class="max-w-7xl mx-auto px-6 md:px-0 grid md:grid-cols-3 gap-12 items-center">

            {{-- image kdes --}}
            <div class="flex items-center justify-center">
                <img src="images/unknown-person.jpeg" alt="Kepala Desa" loading="lazy"
                    class="w-72 h-96 object-cover rounded-b-[120px] shadow-[0_10px_40px_rgba(0,0,0,0.4)] transition-shadow duration-500 mb-4">
            </div>

            {{-- kata sambutan --}}
            <div class="md:col-span-2 mt-7">
                <h3 class="text-4xl font-extrabold text-custom leading-snug">Sambutan Kepala Desa Aje</h3>
                <div class="justify-center text-left">
                    <h3 class="text-xl font-bold text-black">Bapak Kepala Desa</h3>
                    <p class="text-custom text-lg font-medium leading-9 mb-4">Kepala Desa Aje</p>
                </div>

                <p class="text-gray-700 text-md md:text-lg leading-relaxed mb-4">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh.
                    Dengan penuh rasa syukur, saya menyampaikan sambutan ini sebagai bentuk
                    komitmen dalam mewujudkan pemerintahan desa yang transparan, akuntabel,
                    dan partisipatif demi kesejahteraan masyarakat Desa Aje.
                </p>

                <p class="text-gray-700 text-md md:text-lg leading-relaxed">
                    Website ini diharapkan menjadi sarana komunikasi dan informasi resmi
                    antara pemerintah desa dengan masyarakat, sekaligus wadah transparansi
                    dalam pembangunan desa yang lebih maju dan sejahtera.
                </p>
            </div>
        </div>
    </section>

    {{-- END SAMBUTAN KADES --}}

    {{-- PETA DESA --}}

    <section class="pb-16 bg-custom-2">
        <div class="max-w-7xl mx-auto px-4 md:px-0 space-y-8">
            <div class="text-start">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-custom">PETA DESA</h2>
                <p class="mt-2 text-gray-700 text-base sm:text-lg">
                    Berikut lokasi Desa Aje beserta sekitarnya untuk memudahkan masyarakat dan pengunjung.
                </p>
            </div>

            {{-- peta digitasi --}}
            <div class="w-full h-80 bg-black sm:h-96 md:h-[500px] rounded-3xl overflow-hidden">
                <iframe src="" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    {{-- END PETA DESA --}}

    {{-- CARD SOTK --}}

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-0 mb-20">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-custom">
                    SOTK
                </h2>
                <a href="{{ route('sotk') }}"
                    class="mt-4 lg:mt-0 bg-custom self-start text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-300">
                    Lihat Selengkapnya
                </a>
            </div>

            {{-- grid --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($aparats as $aparat)
                    {{-- Card Template --}}
                    <article class="relative mb-12">
                        <figure class="rounded-3xl overflow-hidden shadow h-54 md:h-96">
                            <img src="{{ asset('storage/' . $aparat->foto_aparat) }}"
                                alt="Budi Santoso - Kepala Administrasi Desa" loading="lazy" class="w-full h-full object-cover">
                        </figure>

                        <figcaption
                            class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-11/12 sm:w-10/12 bg-custom px-4 py-4 text-center z-10 shadow">
                            <h3 class="text-sm sm:text-lg font-bold text-white">
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

    {{-- END SOTK --}}

    {{-- ADMINISTRASI --}}

    <section class="py-20 bg-custom-2">
        <div class="max-w-7xl mx-auto px-6 md:px-0">
            <div class="text-start mb-12">
                <h2 class="text-4xl font-extrabold text-custom mb-3">
                    ADMINISTRASI PENDUDUK
                </h2>
                <p class="text-gray-700 text-lg">
                    Statistik lengkap Desa Tahun 2025 termasuk jumlah penduduk, kepala keluarga, usia produktif, dan lansia.
                </p>
            </div>

            {{-- grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 text-white gap-4">

                {{-- card 1 --}}
                <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                    <h3 class="text-xl font-bold">Jumlah Penduduk</h3>
                    <p class="text-4xl font-extrabold">3.257</p>
                </div>

                {{-- card 2 --}}
                <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                    <h3 class="text-xl font-bold">Laki-Laki</h3>
                    <p class="text-4xl font-extrabold">1.620</p>
                </div>

                {{-- card 3 --}}
                <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                    <h3 class="text-xl font-bold">Perempuan</h3>
                    <p class="text-4xl font-extrabold">1.637</p>
                </div>

                {{-- card 4 --}}
                <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                    <h3 class="text-xl font-bold">Kepala Keluarga</h3>
                    <p class="text-4xl font-extrabold">820</p>
                </div>

                {{-- card 5 --}}
                <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                    <h3 class="text-xl font-bold">Usia Produktif</h3>
                    <p class="text-4xl font-extrabold">1.890</p>
                </div>

                {{-- card 6 --}}
                <div class="bg-custom p-6 flex justify-between items-center transition-colors rounded-xl duration-300">
                    <h3 class="text-xl font-bold">Lansia</h3>
                    <p class="text-4xl font-extrabold">420</p>
                </div>
            </div>
        </div>
    </section>

    {{-- END ADMINISTRASI --}}

    {{-- APB DESA --}}

    <section class="py-10 bg-custom-2">
        <div class="max-w-7xl mx-auto px-6 md:px-0 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-extrabold text-custom mb-4">
                    APB DESA 2025
                </h2>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Ringkasan Anggaran Pendapatan dan Belanja Desa (APBDes) Tahun 2025 mencakup pendapatan,
                    belanja, serta pembiayaan yang dialokasikan untuk pembangunan desa dan pemberdayaan masyarakat.
                </p>
                <a href="#"
                    class="mt-4 lg:mt-0 bg-custom rounded-xl text-white font-semibold py-2 px-6 transition-colors duration-300">
                    Lihat Selengkapnya
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                {{-- card pemdapatn --}}
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all">
                    <h3 class="text-xl font-bold text-custom mb-2">Pendapatan Desa</h3>
                    <p class="text-3xl font-extrabold text-custom">Rp 2,1 M</p>
                    <p class="text-gray-600 mt-2 text-sm">Berasal dari Dana Desa, PADes, dan bantuan pemerintah.</p>
                </div>

                {{-- bellanja --}}
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all">
                    <h3 class="text-xl font-bold text-custom mb-2">Belanja Desa</h3>
                    <p class="text-3xl font-extrabold text-custom">Rp 1,8 M</p>
                    <p class="text-gray-600 mt-2 text-sm">Dialokasikan untuk pembangunan infrastruktur, kesehatan, dan
                        pendidikan.</p>
                </div>

                {{-- gatau tampilan aja --}}
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all sm:col-span-2">
                    <h3 class="text-xl font-bold text-custom mb-2">Pembiayaan</h3>
                    <p class="text-3xl font-extrabold text-custom">Rp 300 Jt</p>
                    <p class="text-gray-600 mt-2 text-sm">Digunakan untuk menutup defisit dan mendukung kegiatan prioritas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- END APB DESA --}}


    {{-- BERITA --}}

    <section class="py-20 bg-custom-2">
        <div class="max-w-7xl mx-auto px-6 md:px-0">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
                <div class="text-start">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-custom">
                        BERITA TERBARU DESA
                    </h2>
                    <p class="text-gray-700 mt-2">
                        Informasi dan kegiatan terbaru dari desa untuk masyarakat.
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('berita') }}"
                        class="mt-4 lg:mt-0 bg-custom text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-300">
                        Lihat Selengkapnya
                    </a>
                </div>
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
            </div>
        </div>
    </section>

    {{-- POTENSI DESA --}}

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-12">
            <header class="grid lg:grid-cols-2 gap-6 items-center">
                <div>
                    <h2 class="text-4xl font-extrabold text-custom mb-4">
                        POTENSI DESA
                    </h2>
                    <a href="{{ route('potensi') }}"
                        class="inline-block bg-custom text-white font-semibold py-2 px-6 rounded-lg hover:bg-custom transition-colors duration-300">
                        Lihat Selengkapnya
                    </a>
                </div>

                <p class="text-black max-w-2xl">
                    Desa kami memiliki berbagai potensi unggulan dalam bidang <strong>pertanian</strong> dan <strong>UMKM
                        lokal</strong> yang mendukung kesejahteraan masyarakat serta mendorong pertumbuhan ekonomi
                    berkelanjutan.
                </p>
            </header>

            {{-- grid --}}
            <div class="grid lg:grid-cols-2 gap-8">

                {{-- kiri --}}
                <div class="grid grid-cols-2 gap-4">

                    {{-- image 1 --}}
                    <a href="{{ route('detailPotensiDesa') }}">
                        <article class="relative rounded-xl overflow-hidden shadow-md group">
                            <img src="images/71d83261-1c05-4fe1-9403-04d7539bfa9d.jpeg" alt="desa" loading="lazy"
                                class="w-full h-56 object-cover group-hover:scale-105 transition">
                            <div class="absolute inset-0 bg-custom/70 flex items-end p-3">
                                <h3 class="text-white font-bold text-lg">Pertanian</h3>
                            </div>
                        </article>
                    </a>

                    {{-- image 2 --}}
                    <a href="{{ route('detailPotensiDesa') }}">
                        <article class="relative rounded-xl overflow-hidden shadow-md group">
                            <img src="images/71d83261-1c05-4fe1-9403-04d7539bfa9d.jpeg" alt="desa" loading="lazy"
                                class="w-full h-56 object-cover group-hover:scale-105 transition">
                            <div class="absolute inset-0 bg-custom/70 flex items-end p-3">
                                <h3 class="text-white font-bold text-lg">Pariwisata</h3>
                            </div>
                        </article>
                    </a>

                    {{-- image 3 --}}
                    <article class="relative rounded-xl overflow-hidden shadow-md group col-span-2">
                        <img src="images/71d83261-1c05-4fe1-9403-04d7539bfa9d.jpeg" alt="desa" loading="lazy"
                            class="w-full h-64 object-cover group-hover:scale-105 transition">
                        <div class="absolute inset-0 bg-custom/70 flex items-end p-3">
                            <h3 class="text-white font-bold text-lg">UMKM Lokal</h3>
                        </div>
                    </article>
                </div>

                {{-- image gede --}}
                <div class="relative rounded-xl overflow-hidden shadow-lg group">
                    <img src="images/71d83261-1c05-4fe1-9403-04d7539bfa9d.jpeg" alt="desa" loading="lazy"
                        class="w-full h-80 object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-custom/70 flex flex-col p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Desa</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- END POTENSI DESA --}}

    {{-- BELI DARI DESA --}}

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-12">
            <header class="flex flex-col lg:flex-row items-start lg:items-center justify-between mx-auto">
                <div>
                    <h2 class="text-4xl font-extrabold text-custom mb-2">
                        BELI DARI DESA
                    </h2>
                    <p class="text-gray-600 max-w-xl">
                        Dukung perekonomian lokal dengan membeli produk unggulan hasil karya masyarakat desa.
                    </p>
                </div>
                <a href="{{ route('produkDesa') }}"
                    class="mt-4 lg:mt-0 bg-custom text-white font-semibold py-2 px-6 rounded-lg hover:bg-custom transition-colors duration-300">
                    Lihat Selengkapnya
                </a>
            </header>

            {{-- produk grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- produk --}}
                @foreach (range(1, 3) as $i)
                    <a href="{{ route('detailProduk') }}" class="no-underline">
                        <article>
                            <img src="images/tegel-desa.jpg" alt="Tegel" loading="lazy"
                                class="w-full h-100 object-cover bg-custom-2 rounded-2xl">
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

    {{-- END BELI DARI DESA --}}

    {{-- GALERI --}}

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-0">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-4xl font-extrabold text-custom">
                    GALERI DESA
                </h2>
                <a href="{{ route('galeri') }}"
                    class="mt-4 lg:mt-0 bg-custom text-white font-semibold py-2 px-6 rounded-lg hover:bg-custom transition-colors duration-300">
                    Lihat Selengkapnya
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                @foreach ($galeris as $galeri)
                    {{-- card 1 --}}
                    <figure class="overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                        <picture>
                            <img src="{{ asset('storage/' . $galeri->file_path) }}" alt="{{ $galeri->nama_gambar }}"
                                class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300"
                                loading="lazy">
                        </picture>
                        <figcaption class="sr-only line-clamp-2">{{ $galeri->nama_gambar }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    {{-- END GALERI --}}

@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const slides = document.querySelectorAll("#carousel > div");
        const indicators = document.querySelectorAll("section > div span");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        let current = 0;
        const total = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle("opacity-100", i === index);
                slide.classList.toggle("opacity-0", i !== index);
            });
            indicators.forEach((dot, i) => {
                dot.classList.toggle("opacity-80", i === index);
                dot.classList.toggle("opacity-50", i !== index);
            });
        }

        function nextSlide() {
            current = (current + 1) % total;
            showSlide(current);
        }

        function prevSlide() {
            current = (current - 1 + total) % total;
            showSlide(current);
        }

        // Tombol next & prev
        nextBtn.addEventListener("click", nextSlide);
        prevBtn.addEventListener("click", prevSlide);

        // autoplay setiap 5 detik
        setInterval(nextSlide, 5000);

        // tampilkan slide pertama
        showSlide(current);
    });
</script>
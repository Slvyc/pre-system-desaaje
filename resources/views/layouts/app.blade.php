<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <title>Desa Aje Pagar Air</title>
    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- NAVBAR START --}}

    <header class="fixed inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="mx-auto flex items-center justify-between p-6 lg:px-8 bg-white">
            <div class="flex items-center lg:flex-1 gap-4">
                {{-- logo --}}
                <a href="#" class="-m-1.5 p-1.5 flex items-center">
                    <img src="{{ asset('images/logo-acehbesar.png') }}" alt="logo-acehbesar" loading="lazy"
                        class="h-12 w-auto" />
                </a>

                {{-- nama desa --}}
                <div class="flex flex-col leading-tight">
                    <span class="text-lg font-bold text-gray-900">Desa Aje</span>
                    <span class="text-sm text-gray-600">Kabupaten Aceh Besar</span>
                </div>
            </div>

            <div class="flex lg:hidden">
                <button id="hamburgerBtn" type="button" class="lg:hidden p-2 text-gray-700">
                    <span class="sr-only">Open menu</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            {{-- Navbar Links Group --}}
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}" class="text-md font-semibold leading-6 text-gray-900">Home</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Profil Desa</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Infografis</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Geodata</a>
                <a href="{{ route('berita') }}" class="text-md font-semibold leading-6 text-gray-900">Berita</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Belanja</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">PPID</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#"
                    class="flex items-center gap-2 text-sm font-semibold py-2 px-3 rounded-4xl text-white bg-custom transition-colors">
                    <span>Buat Pengaduan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                            clip-rule="evenodd" />
                        <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
                    </svg>
                </a>
            </div>
        </nav>

        {{-- MOBILE MENU --}}

        {{-- overlay biar blur blakang --}}
        <div id="overlay"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9998] hidden opacity-0 transition-opacity duration-300 ease-out"
            aria-hidden="true">
        </div>

        <aside id="mobileMenu" role="dialog" aria-modal="true" aria-labelledby="menuTitle"
            class="fixed top-0 right-0 h-full w-4/5 max-w-sm z-[9999] hidden bg-white shadow-xl overflow-y-auto p-6 sm:ring-1 sm:ring-gray-900/10 lg:hidden transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                <div class="flex items-center space-x-3">
                    <img src="images/logo-acehbesar.png" alt="Logo Kabupaten Aceh Besar" loading="lazy" width="40"
                        height="40" class="h-10 w-auto" />
                    <div class="flex flex-col leading-tight">
                        <span id="menuTitle" class="text-base font-bold text-gray-900">Desa Aje</span>
                        <span class="text-sm text-gray-600">Kabupaten Aceh Besar</span>
                    </div>
                </div>
                <button id="closeBtn" type="button" aria-label="Tutup menu"
                    class="rounded-md p-2 text-gray-700 hover:bg-gray-100 transition">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6"
                        aria-hidden="true">
                        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <nav class="mt-6" aria-label="Navigasi Utama">
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">Home</a>
                    </li>
                    <li><a href="#"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">Profil
                            Desa</a></li>
                    <li><a href="#"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">Infografis</a>
                    </li>
                    <li><a href="#"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">Geodata</a>
                    </li>
                    <li><a href="{{ route('berita') }}"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">Berita</a>
                    </li>
                    <li><a href="#"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">Belanja</a>
                    </li>
                    <li><a href="#"
                            class="block rounded-lg px-4 py-3 text-base font-semibold text-gray-800 hover:bg-custom hover:text-white transition">PPID</a>
                    </li>
                </ul>
            </nav>

            <div class="mt-8 border-t border-gray-200 pt-6">
                <a href="#"
                    class="flex gap-2 justify-center text-sm font-semibold py-2 px-3 rounded-3xl text-white bg-custom hover:bg-green-700 transition">
                    <span>Buat Pengaduan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                            clip-rule="evenodd" />
                        <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
                    </svg>
                </a>
            </div>
        </aside>

    </header>

    {{-- NAVBAR END --}}

    {{-- CONTENT START --}}

    @yield('content')

    {{-- CONTENT END --}}

    {{-- FOOTER --}}

    <footer class="bg-custom text-white">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <img src="{{ asset('images/logo-acehbesar.png') }}" alt="Logo Desa" loading="lazy" class="w-20 mb-4">
                <h3 class="font-bold text-lg text-white mb-2">Pemerintah Desa Aje</h3>
                <p class="text-sm leading-relaxed">
                    Jl. jalan jalan <br>
                    Desa Aje, Kecamatan Pagar Air, Kabupaten Aceh Besar <br>
                    Provinsi Aceh
                </p>
            </div>
            <div>
                <h3 class="font-bold text-lg text-white mb-3">Hubungi Kami</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2">
                        <span>📞</span> 081241111811
                    </li>
                    <li class="flex items-center gap-2">
                        <span>✉️</span> desaaje@gmail.com
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg text-white mb-3">Nomor Telepon</h3>
            </div>
            <div>
                <h3 class="font-bold text-lg text-white mb-3">Jelajahi</h3>
            </div>
        </div>

        {{-- copyright --}}

        <div class="border-t border-green-800 mt-8">
            <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row items-center justify-between text-sm">
                <p>© 2025 Pemerintah Desa Aje. All rights reserved.</p>
                <p>Powered by <span class="text-yellow-300 font-semibold">Unaya Tim PM Bima</span></p>
            </div>
        </div>
    </footer>

    {{-- END FOOTER --}}

</body>

</html>
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
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Desa Aje Pagar Air</span>
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt=""
                        class="h-8 w-auto" />
                </a>
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
                <a href="home" class="text-md font-semibold leading-6 text-gray-900">Home</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Profil Desa</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Infografis</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Geodata</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Berita</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">Belanja</a>
                <a href="#" class="text-md font-semibold leading-6 text-gray-900">PPID</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#"
                    class="flex items-center gap-2 text-sm font-semibold p-3 rounded-4xl text-white bg-custom transition-colors">
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

        <div id="mobileMenu"
            class="fixed inset-0 z-[9999] hidden bg-white overflow-y-auto p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 lg:hidden">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt=""
                        class="h-8 w-auto" />
                </a>
                <button id="closeBtn" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"
                        class="w-6 h-6">
                        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Home</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Profil
                            Desa</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Infografis</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Geodata</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Berita</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Belanja</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">PPID</a>
                    </div>
                    <div class="py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- NAVBAR END --}}

    {{-- CONTENT START --}}

    @yield('content')

    {{-- CONTENT END --}}

    {{-- FOOTER --}}

    <footer class="bg-custom text-white">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <img src="images/logo-desa.png" alt="Logo Desa" class="w-20 mb-4">
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
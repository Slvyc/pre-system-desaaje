@extends('layouts.app')

@section('content')

    <main class="py-16 bg-custom-2 pt-20">
        <div class="max-w-7xl mx-auto px-6 md:px-0 space-y-16">

            {{-- tabbar --}}
            @include('infografis.tabbar-infografis.tabbar')

            <section class="space-y-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-custom-3 text-center">
                    Jumlah Penerima Bansos
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    <div
                        class="bg-white p-6 md:p-8 rounded-2xl shadow-lg transition-all duration-300 flex flex-col justify-between col-span-2 md:col-span-2">
                        <div>
                            <p class="text-4xl md:text-5xl font-bold text-custom-3">140</p>
                            <p class="text-sm md:text-base text-gray-500 mt-1">Penduduk</p>
                        </div>
                        <p class="mt-4 md:mt-6 text-gray-700 text-sm md:text-base">mendapatkan bantuan</p>
                        <p class="text-gray-700 text-base md:text-lg font-semibold">Bantuan Langsung Tunai Dana
                            Desa</p>
                    </div>

                    <div
                        class="bg-white p-6 md:p-8 rounded-2xl shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <p class="text-4xl md:text-5xl font-bold text-custom-3">114</p>
                            <p class="text-sm md:text-base text-gray-500 mt-1">Penduduk</p>
                        </div>
                        <p class="mt-4 md:mt-6 text-gray-700 text-xs md:text-base">mendapatkan bantuan</p>
                        <p class="text-gray-700 text-base md:text-lg font-semibold">BST-Kemensos</p>
                    </div>

                    <div
                        class="bg-white p-6 md:p-8 rounded-2xl shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <p class="text-4xl md:text-5xl font-bold text-custom-3">25</p>
                            <p class="text-sm md:text-base text-gray-500 mt-1">Penduduk</p>
                        </div>
                        <p class="mt-4 md:mt-6 text-gray-700 text-xs md:text-base">mendapatkan bantuan</p>
                        <p class="text-gray-700 text-base md:text-lg font-semibold">PKH</p>
                    </div>

                    <div
                        class="bg-white p-6 md:p-8 rounded-2xl shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <p class="text-4xl md:text-5xl font-bold text-custom-3">3</p>
                            <p class="text-sm md:text-base text-gray-500 mt-1">Penduduk</p>
                        </div>
                        <p class="mt-4 md:mt-6 text-gray-700 text-xs md:text-base">mendapatkan bantuan</p>
                        <p class="text-gray-700 text-base md:text-lg font-semibold">BLT</p>
                    </div>

                    <div
                        class="bg-white p-6 md:p-8 rounded-2xl shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <p class="text-4xl md:text-5xl font-bold text-custom-3">1</p>
                            <p class="text-sm md:text-base text-gray-500 mt-1">Penduduk</p>
                        </div>
                        <p class="mt-4 md:mt-6 text-gray-700 text-xs md:text-base">mendapatkan bantuan</p>
                        <p class="text-gray-700 text-base md:text-lg font-semibold">PBI-APBD</p>
                    </div>
                </div>
            </section>

            <section class="space-y-12 my-30">
                <h2 class="text-3xl md:text-4xl font-extrabold text-custom-3 text-center">
                    Cek Penerima Bansos
                </h2>

                <div class="flex justify-center">
                    <form class="w-full md:w-2/3 lg:w-2/2 relative">
                        <input type="text" placeholder="Masukkan NIK Penerima..."
                            class="w-full px-6 py-3 rounded-full bg-white border-2 border-custom focus:ring-2 focus:ring-custom focus:border-transparent text-lg placeholder-gray-400 shadow-md transition-all duration-200">
                        <button type="submit"
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-custom-3 hover:bg-custom-4 text-white rounded-full p-2 shadow-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>

@endsection
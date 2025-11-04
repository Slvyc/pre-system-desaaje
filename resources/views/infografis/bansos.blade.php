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

                {{-- ======================================================= --}}
                {{-- BAGIAN STATISTIK (DIBUAT DINAMIS) --}}
                {{-- ======================================================= --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    {{--
                    Kita loop data $statistikBansos yang dikirim dari controller.
                    Eloquent mengirim 'penerima_bansos_count'
                    untuk setiap $jenis bansos.
                    --}}
                    @foreach ($statistikBansos as $jenis)
                        <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg transition-all duration-300 flex flex-col justify-between
                                                    {{-- 
                                                        $loop->first adalah variabel helper dari Blade
                                                        untuk memberikan style khusus pada item pertama (BLT Dana Desa)
                                                        agar tampilannya 'col-span-2' sesuai desain Anda.
                                                    --}}
                                                    @if ($loop->first)
                                                        col-span-2 md:col-span-2
                                                    @endif
                                                    ">
                            <div>
                                {{-- ANGKA DINAMIS --}}
                                <p class="text-4xl md:text-5xl font-bold text-custom-3">{{ $jenis->penerima_bansos_count }}</p>
                                <p class="text-sm md:text-base text-gray-500 mt-1">Penduduk</p>
                            </div>
                            <p class="mt-4 md:mt-6 text-gray-700 text-sm md:text-base">mendapatkan bantuan</p>
                            {{-- NAMA BANTUAN DINAMIS --}}
                            <p class="text-gray-700 text-base md:text-lg font-semibold">{{ $jenis->nama_bantuan }}</p>
                        </div>
                    @endforeach

                </div>
            </section>

            <section class="space-y-12 my-30">
                <h2 class="text-3xl md:text-4xl font-extrabold text-custom-3 text-center">
                    Cek Penerima Bansos
                </h2>

                <div class="flex justify-center">
                    {{-- ======================================================= --}}
                    {{-- BAGIAN FORM PENCARIAN (DIPERBARUI) --}}
                    {{-- ======================================================= --}}
                    <form class="w-full md:w-2/3 lg:w-2/2 relative" action="{{ route('infografis.bansos.search') }}"
                        method="GET">
                        {{--
                        PENTING:
                        1. action="{{ route('bansos.search') }}" -> Mengarahkan ke controller
                        2. method="GET" -> Sesuai dengan route
                        3. name="nik" -> Agar controller bisa menerima input
                        4. value="{{ $nikYangDicari ?? '' }}" -> Menampilkan NIK terakhir yang dicari
                        --}}
                        <input type="text" placeholder="Masukkan NIK Penerima..." name="nik"
                            value="{{ $nikYangDicari ?? '' }}"
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

            {{-- ======================================================= --}}
            {{-- BAGIAN HASIL PENCARIAN (BARU) --}}
            {{-- ======================================================= --}}

            {{--
            Bagian ini hanya akan tampil jika variabel $nikYangDicari
            ada (artinya, pengguna sudah menekan tombol "Cari")
            --}}
            @if (isset($nikYangDicari))
                <section class="pb-16">
                    <div class="max-w-2xl mx-auto bg-white p-6 md:p-8 rounded-2xl shadow-lg">

                        {{-- KASUS 1: NIK DICARI DAN DITEMUKAN --}}
                        @if ($hasilPencarian)
                            <h3 class="text-2xl font-bold text-custom-3 mb-4">
                                Hasil Pencarian
                            </h3>
                            <div class="space-y-2 text-lg">
                                <p><strong>Nama:</strong> {{ $hasilPencarian->nama }}</p>
                                <p><strong>NIK:</strong> {{ $hasilPencarian->nik }}</p>
                            </div>

                            {{-- Cek apakah dia terdaftar di bansos --}}
                            @if ($hasilPencarian->penerimaBansos->isEmpty())
                                <p class="mt-4 font-semibold text-yellow-700 text-lg">
                                    Penduduk ini terdaftar, namun <span class="font-bold">tidak terdaftar</span> sebagai penerima bansos
                                    apapun.
                                </p>
                            @else
                                <p class="mt-6 font-semibold text-gray-700 text-lg">
                                    Terdaftar sebagai penerima bantuan:
                                </p>
                                <ul class="list-disc list-inside mt-2 space-y-2 text-lg">
                                    {{-- Loop semua bantuan yang dia terima --}}
                                    @foreach ($hasilPencarian->penerimaBansos as $penerima)
                                        <li>
                                            <span class="font-semibold">{{ $penerima->jenisBansos->nama_bantuan }}</span>
                                            (Sumber: {{ $penerima->jenisBansos->sumber_dana }})
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            {{-- KASUS 2: NIK DICARI TAPI TIDAK DITEMUKAN DI DATABASE --}}
                        @else
                            <div class="text-center">
                                <p class="text-xl font-semibold text-red-600">
                                    Data NIK: {{ $nikYangDicari }} tidak ditemukan.
                                </p>
                                <p class="text-gray-500 mt-1">Silakan periksa kembali NIK yang Anda masukkan.</p>
                            </div>
                        @endif

                    </div>
                </section>
            @endif

        </div>
    </main>

@endsection
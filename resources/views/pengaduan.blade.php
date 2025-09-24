@extends('layouts.app')

@section('content')
    <main class="py-16 bg-custom-2 pt-32">
        <div class="max-w-4xl mx-auto px-6 md:px-0">

            {{-- HEADING --}}
            <header class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold uppercase text-custom">
                    Formulir Pengaduan
                </h1>
                <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">
                    Sampaikan aspirasi, laporan, atau keluhan Anda kepada pemerintah desa. Kami akan menindaklanjutinya
                    sesegera mungkin.
                </p>
            </header>

            {{-- FORM --}}
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-lg">
                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    {{-- NAMA & NO HP --}}
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama
                                Lengkap</label>
                            <input type="text" name="nama" id="nama" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-custom focus:border-custom transition"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div>
                            <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor HP / WhatsApp
                            </label>
                            <input type="tel" name="no_hp" id="no_hp" required pattern="^08[0-9]{8,11}$"
                                title="Nomor HP harus diawali 08 dan panjang 10–13 digit"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-custom focus:border-custom transition"
                                placeholder="Contoh: 081234567890">
                        </div>
                    </div>

                    {{-- KATEGORI --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Kategori Pengaduan</label>
                        <div class="flex flex-wrap gap-3">
                            @php
                                $kategori = ['Umum', 'Sosial', 'Keamanan', 'Kesehatan', 'Kebersihan', 'Permintaan'];
                            @endphp

                            @foreach ($kategori as $item)
                                <div>
                                    <input type="radio" name="kategori_pengaduan" id="kategori_{{ strtolower($item) }}"
                                        value="{{ $item }}" class="peer hidden" required>
                                    <label for="kategori_{{ strtolower($item) }}"
                                        class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-full cursor-pointer text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 peer-checked:bg-custom peer-checked:text-white peer-checked:border-custom">
                                        {{ $item }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('kategori_pengaduan')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ISI PENGADUAN --}}
                    <div>
                        <label for="isi_pengaduan" class="block text-sm font-semibold text-gray-700 mb-2">Isi
                            Pengaduan</label>
                        <textarea name="isi_pengaduan" id="isi_pengaduan" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-custom focus:border-custom transition"
                            placeholder="Tuliskan detail pengaduan Anda di sini..."></textarea>
                    </div>

                    {{-- LAMPIRAN --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Lampiran (Opsional)</label>
                        <div
                            class="mt-2 flex items-center justify-center w-full bg-gray-50 border-2 border-gray-300 border-dashed rounded-lg p-6">
                            <div class="text-center">
                                <svg class="mx-auto h-10 w-10 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 16.5V9.75m0 0l-3 3m3-3l3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                                <div class="mt-4 flex text-sm text-gray-600">
                                    <label for="lampiran"
                                        class="relative cursor-pointer font-semibold text-custom hover:text-green-700">
                                        <span>Pilih file untuk diunggah</span>
                                        <input id="lampiran" name="lampiran" type="file" class="sr-only"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                    </label>
                                </div>
                                <p id="file-name-display" class="mt-1 text-sm text-gray-800 font-medium"></p>
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG, atau PDF. Maksimal 2MB.</p>
                            </div>
                        </div>
                    </div>

                    {{-- SUBMIT BUTTON --}}
                    <div class="text-center pt-4">
                        <button type="submit"
                            class="w-full md:w-auto inline-flex justify-center items-center gap-2 px-8 py-3 text-base font-semibold rounded-full text-white bg-custom hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                            </svg>
                            <span>Kirim Pengaduan</span>
                        </button>
                    </div>

                    {{-- ALERT --}}
                    @if (session('success'))
                        <div class="rounded-md bg-green-50 p-4">
                            <div class="text-sm leading-5 font-medium text-green-800">{{ session('success') }}</div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const fileInput = document.getElementById('lampiran');
                const fileNameDisplay = document.getElementById('file-name-display');

                fileInput.addEventListener('change', function () {
                    if (this.files.length > 0) {
                        fileNameDisplay.textContent = `File terpilih: ${this.files[0].name}`;
                    }
                });
            });
        </script>
    @endpush
@endsection
@extends('layouts.app')

@section('content')

    <section class="py-20 bg-white pt-30">
        <div class="max-w-7xl mx-auto px-6 md:px-0">
            <h2 class="text-4xl font-extrabold text-custom mb-10">
                GALERI DESA
            </h2>

            {{-- ini layout foto kek pinterest (layout mansory kek batu bata) layout menyesuaikan tiinggi sama lebar si foto , tapi tetep rapi, fotonya kukososingin --}}
            <div class="columns-1 sm:columns-2 md:columns-3 gap-4 space-y-4">
                @foreach (range(1, 12) as $i)
                    <figure class="break-inside-avoid overflow-hidden rounded-xl shadow hover:shadow-lg transition">
                        <img src="" alt="Galeri Desa" 
                            class="w-full h-auto object-cover hover:scale-105 transition-transform duration-300">
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

@endsection
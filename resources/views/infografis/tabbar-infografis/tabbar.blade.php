<div class="w-full mt-5">
    <div class="relative right-0">
        <ul class="relative flex flex-wrap justify-center gap-10 sm:gap-30 py-1 items-center list-none rounded-xl bg-white"
            role="list">

            {{-- Penduduk --}}
            <li>
                <a href="{{ url('/infografis/penduduk') }}"
                    class="flex flex-col md:flex-row items-center justify-center w-full gap-1 md:gap-2 py-2 text-xs md:text-sm transition-all duration-300 rounded-md
                    {{ Request::is('infografis/penduduk') ? 'text-custom font-semibold' : 'text-slate-500 hover:text-custom' }}">

                    <div class="flex items-center justify-center w-8 h-8 rounded-full transition-colors duration-300
                        {{ Request::is('infografis/penduduk')
    ? 'bg-custom/20 text-custom'
    : 'bg-transparent text-slate-500 hover:bg-custom/10 hover:text-custom' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                        </svg>
                    </div>
                    <span>Penduduk</span>
                </a>
            </li>

            {{-- apbdes --}}
            <li>
                <a href="{{ url('/infografis/apbdes') }}"
                    class="flex flex-col md:flex-row items-center justify-center w-full gap-1 md:gap-2 py-2 text-xs md:text-sm transition-all duration-300 rounded-md
                    {{ Request::is('infografis.apbdes') ? 'text-custom font-semibold' : 'text-slate-500 hover:text-custom' }}">

                    <div class="flex items-center justify-center w-8 h-8 rounded-full transition-colors duration-300
                        {{ Request::is('infografis.apbdes')
    ? 'bg-custom/20 text-custom'
    : 'bg-transparent text-slate-500 hover:bg-custom/10 hover:text-custom' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                            <path fill-rule="evenodd"
                                d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span>APBDes</span>
                </a>
            </li>


            {{-- Stunting --}}
            <li>
                <a href="{{ url('/infografis/stunting') }}"
                    class="flex flex-col md:flex-row items-center justify-center w-full gap-1 md:gap-2 py-2 text-xs md:text-sm transition-all duration-300 rounded-md
                    {{ Request::is('infografis.stunting') ? 'text-custom font-semibold' : 'text-slate-500 hover:text-custom' }}">

                    <div class="flex items-center justify-center w-8 h-8 rounded-full transition-colors duration-300
                        {{ Request::is('infografis.stunting')
    ? 'bg-custom/20 text-custom'
    : 'bg-transparent text-slate-500 hover:bg-custom/10 hover:text-custom' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span>Stunting</span>
                </a>
            </li>

            {{-- Bansos --}}
            <li>
                <a href="{{ url('/infografis/bansos') }}"
                    class="flex flex-col md:flex-row items-center justify-center w-full gap-1 md:gap-2 py-2 text-xs md:text-sm transition-all duration-300 rounded-md
                    {{ Request::is('inforgrafis.bansos') ? 'text-custom font-semibold' : 'text-slate-500 hover:text-custom' }}">

                    <div class="flex items-center justify-center w-8 h-8 rounded-full transition-colors duration-300
                        {{ Request::is('bansos')
    ? 'bg-custom/20 text-custom'
    : 'bg-transparent text-slate-500 hover:bg-custom/10 hover:text-custom' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z"
                                clip-rule="evenodd" />
                            <path
                                d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z" />
                        </svg>
                    </div>
                    <span>Bansos</span>
                </a>
            </li>

        </ul>
    </div>
</div>